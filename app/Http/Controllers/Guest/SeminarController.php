<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Model\Seminar;
use App\Service\Impl\SessionServiceImpl;
use App\Service\SessionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeminarController extends Controller
{
    private SessionService $sessionService;

    public function __construct()
    {
        $this->sessionService = new SessionServiceImpl();
    }


    public function detail(string $id){
        $terdaftar = false;

        $seminar = Seminar::find($id);

        $mahasiswa = $this->sessionService->currentMahasiswa();

        if ($mahasiswa != null){
            $pesertaSeminar = DB::table("peserta_seminar")
                ->where("seminar_id", $seminar->id)
                ->where("nim", $mahasiswa->nim)->first();
            if ($pesertaSeminar != null){
                $terdaftar = true;
            }
        }

        $data = [
            "title" => "Detail Seminar",
            "seminar" => $seminar,
            "terdaftar" => $terdaftar
        ];
        return view("guest.seminar.detail", $data);
    }
}
