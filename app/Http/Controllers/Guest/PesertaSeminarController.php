<?php

namespace App\Http\Controllers\Guest;

use App\Exceptions\MustLoginException;
use App\Exceptions\ValidationExcepton;
use App\Http\Controllers\Controller;
use App\Model\Mahasiswa;
use App\Model\Seminar;
use App\Service\Impl\PesertaSeminarServiceImpl;
use App\Service\Impl\SessionServiceImpl;
use App\Service\PesertaSeminarService;
use App\Service\SessionService;
use Illuminate\Http\Request;

class PesertaSeminarController extends Controller
{
    //

    private PesertaSeminarService $pesertaSeminarService;
    private SessionService $sessionService;


    public function __construct()
    {
        $this->pesertaSeminarService = new PesertaSeminarServiceImpl();
        $this->sessionService = new SessionServiceImpl();
    }


    public function registration(Seminar $seminar){
        try {
            $mahasiswa = $this->sessionService->currentMahasiswa();
            $this->pesertaSeminarService->registration($seminar,$mahasiswa);
            return redirect()->route("guest.user.login")->with("success", "Berhasil mendaftar seminar");
        }catch (ValidationExcepton $validationExcepton){
            return back()->with("error", $validationExcepton->getMessage());
        }catch (MustLoginException $loginException){
            return redirect()->route("guest.user.login")->with("error", $loginException->getMessage());
        }
    }
}
