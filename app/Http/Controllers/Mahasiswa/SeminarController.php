<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Service\Impl\SessionServiceImpl;
use App\Service\SessionService;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
    //

    private SessionService $sessionService;

    public function __construct()
    {
        $this->sessionService = new SessionServiceImpl();
    }


    public function registered()
    {
        $mahasiswa = $this->sessionService->currentMahasiswa();

        $seminar = $mahasiswa->seminar()
            ->orderBy("pivot_created_at","DESC")
            ->paginate(2);

        $data = [
            "title" => "Seminar Dashboard",
            "seminar" => $seminar
        ];
        return view("mahasiswa.seminar.registered",$data);
    }
}
