<?php

namespace App\Service;

use App\Http\Response\PesertaSeminarResponse;
use App\Http\Response\SeminarResponse;
use App\Model\Mahasiswa;
use App\Model\Seminar;

interface PesertaSeminarService
{
    public function registration(Seminar $seminar, ?Mahasiswa $mahasiswa): PesertaSeminarResponse;

}
