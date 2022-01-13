<?php

namespace App\Service\Impl;

use App\Http\Requests\SeminarAddRequest;
use App\Http\Response\SeminarResponse;
use App\Model\Seminar;
use App\Service\SeminarService;
use App\Util\RandomUtil;
use App\Util\UploadFileUtil;
use Illuminate\Support\Facades\DB;

class SeminarServiceImpl implements SeminarService
{

    public function add(SeminarAddRequest $request): SeminarResponse
    {

        try {
            DB::beginTransaction();

            $upload = UploadFileUtil::upload($request->file('gambar'),"seminar_image");

            $seminar = new Seminar();
            $seminar->id = RandomUtil::generate("SM");
            $seminar->nama_seminar = $request->nama_seminar;
            $seminar->deskripsi = $request->deskripsi;
            $seminar->tanggal_mulai = $request->tanggal_mulai;
            $seminar->tanggal_selesai = $request->tanggal_selesai;
            $seminar->lokasi = $request->lokasi;
            $seminar->gambar = $upload;
            $seminar->kuota = $request->kuota;
            $seminar->save();

            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
        }

        $response = new SeminarResponse();
        $response->seminar = $seminar;

        return $response;

    }
}
