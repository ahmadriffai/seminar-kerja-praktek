<?php

namespace App\Service;

use App\Http\Requests\PesertaSeminarRegisRequest;
use App\Http\Response\PesertaSeminarResponse;
use App\Model\Mahasiswa;
use App\Model\Seminar;

interface PesertaSeminarService
{
    public function registration(PesertaSeminarRegisRequest $request,Seminar $seminar, ?Mahasiswa $mahasiswa): PesertaSeminarResponse;

}
