<?php

namespace App\Http\Response;

use App\Model\Mahasiswa;
use App\Model\Seminar;

class PesertaSeminarResponse
{
    public Mahasiswa $mahasiswa;
    public Seminar $seminar;
}
