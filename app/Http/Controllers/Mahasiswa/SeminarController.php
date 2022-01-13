<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
    //
    public function registered()
    {
        $data = [
            "title" => "Seminar Terdaftar"
        ];
        return view("mahasiswa.seminar.registered",$data);
    }
}
