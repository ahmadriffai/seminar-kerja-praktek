<?php

namespace App\Service\Impl;

use App\Exceptions\MustLoginException;
use App\Exceptions\ValidationExcepton;
use App\Http\Requests\PesertaSeminarRegisRequest;
use App\Http\Response\PesertaSeminarResponse;
use App\Model\Mahasiswa;
use App\Model\Seminar;
use App\Model\Tiket;
use App\Service\PesertaSeminarService;
use App\Util\GenerateQRUtil;
use App\Util\RandomUtil;
use Illuminate\Support\Facades\DB;

class PesertaSeminarServiceImpl implements PesertaSeminarService
{

    public function registration(PesertaSeminarRegisRequest $request, Seminar $seminar, ?Mahasiswa $mahasiswa): PesertaSeminarResponse
    {

        if ($seminar == null){
            throw new ValidationExcepton("Gagal Mendaftar seminar , belum memilih seminar");
        }
        if ($seminar->kuota == 0){
            throw new ValidationExcepton("kuota sudah penuh");
        }
        if ($mahasiswa == null){
            throw new MustLoginException("login terlebih dahulu, untuk melanjutkan pendaftaran");
        }

        $pesertaSeminar = DB::table("peserta_seminar")
            ->where("seminar_id", $seminar->id)
            ->where("nim", $mahasiswa->nim)->first();

        if ($pesertaSeminar != null){
            throw new ValidationExcepton("Anda sudah terdaftar dalam seminar");
        }

        try {
            DB::beginTransaction();


            $seminar->mahasiswa()->attach($mahasiswa->nim, ["is_bayar" => 0,"is_hadir" => 0, "qr_code" => null, "tiket_id" => $request->tiket]);

            $seminar->kuota = $seminar->kuota -1;
            $seminar->save();

            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
        }
        $response = new PesertaSeminarResponse();
        $response->mahasiswa = $mahasiswa;
        $response->seminar = $seminar;
        return $response;

    }
}
