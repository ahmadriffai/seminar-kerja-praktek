<?php

namespace App\Service;

use App\Http\Requests\MahasiswaAddRequest;
use App\Http\Requests\UserCheckNIMRequest;
use App\Http\Requests\MahasiswaEditRequest;
use App\Http\Requests\MahasiswaImportRequest;
use App\Http\Response\MahasiswaResponse;

interface MahasiswaService
{

    public function add(MahasiswaAddRequest $request) : MahasiswaResponse;
    public function delete(string $nim) : void;
    public function edit(MahasiswaEditRequest $request, string $nim) : MahasiswaResponse;
    public function import(MahasiswaImportRequest $request) : MahasiswaResponse;
}
