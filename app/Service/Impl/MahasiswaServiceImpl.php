<?php

namespace App\Service\Impl;

use App\Http\Requests\MahasiswaAddRequest;
use App\Http\Requests\MahasiswaEditRequest;
use App\Http\Requests\MahasiswaImportRequest;
use App\Http\Response\MahasiswaResponse;
use App\Imports\MahasiswaImport;
use App\Model\Mahasiswa;
use App\Service\MahasiswaService;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaServiceImpl implements MahasiswaService
{

    public function add(MahasiswaAddRequest $request): MahasiswaResponse
    {
        try {
            DB::beginTransaction();

            $mahasiswa = new Mahasiswa();
            $mahasiswa->nim = $request->nim;
            $mahasiswa->nama = $request->nama;
            $mahasiswa->prodi = $request->prodi;
            $mahasiswa->angkatan = (int) $request->angkatan;
            $mahasiswa->nomer_telp = $request->nomerTelp;
            $mahasiswa->user_id = null;
            $mahasiswa->save();

            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
        }

        $respponse = new MahasiswaResponse();
        $respponse->mahasiswa = $mahasiswa;

        return $respponse;

    }

    public function delete(string $nim): void
    {
        Mahasiswa::destroy($nim);
    }

    public function edit(MahasiswaEditRequest $request, string $nim): MahasiswaResponse
    {
        try {
            DB::beginTransaction();

            $mahasiswa = Mahasiswa::find($nim);
            $mahasiswa->nim = $request->nim;
            $mahasiswa->nama = $request->nama;
            $mahasiswa->prodi = $request->prodi;
            $mahasiswa->angkatan = (int) $request->angkatan;
            $mahasiswa->nomer_telp = $request->nomerTelp;
            $mahasiswa->user_id = null;
            $mahasiswa->save();

            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
        }

        $respponse = new MahasiswaResponse();
        $respponse->mahasiswa = $mahasiswa;

        return $respponse;

    }

    public function import(MahasiswaImportRequest $request): MahasiswaResponse
    {
        try {
            DB::beginTransaction();

            Excel::import(new MahasiswaImport, $request->file('file_excel'));

            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
        }

        $response = new MahasiswaResponse();
        $response->mahasiswa = null;

        return $response;
    }
}
