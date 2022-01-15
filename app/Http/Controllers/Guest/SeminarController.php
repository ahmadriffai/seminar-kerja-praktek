<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Model\Seminar;
use App\Model\Tiket;
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

        $tiket = Tiket::all();

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
            "terdaftar" => $terdaftar,
            "tiket" => $tiket
        ];
        return view("guest.seminar.detail", $data);
    }

    public function list(){

        $seminar = Seminar::paginate(4);

        $data = [
            "title" => "Daftar Seminar ",
            "seminar" => $seminar
        ];

        return view("guest.seminar.list",$data);
    }


    public function search(Request $request){
        $key = $request->key;

        $seminar = Seminar::where("nama_seminar","like","%".$key."%")
            ->orWhere("deskripsi","like","%".$key."%")
            ->paginate(5);

        $data = [
            "title" => "Daftar Seminar ",
            "seminar" => $seminar
        ];

        return view("guest.seminar.list",$data);
    }
}
