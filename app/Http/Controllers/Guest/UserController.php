<?php

namespace App\Http\Controllers\Guest;

use App\Exceptions\ValidationExcepton;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCheckNIMRequest;
use App\Http\Requests\UserAccountRegisterRequest;
use App\Http\Requests\UserLoginRequest;
use App\Model\Mahasiswa;
use App\Service\Impl\MahasiswaServiceImpl;
use App\Service\Impl\UserServiceImpl;
use App\Service\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    private UserService $userService;

    public function __construct()
    {
        $this->mahasiswaService = new MahasiswaServiceImpl();
        $this->userService = new UserServiceImpl();
    }


    public function checkNIM(){
        $data = [
            "title" => "Registrasi Akun - Check Mahasiswa"
        ];
        return view("guest.user.check-nim", $data);
    }

    public function checkNIMPost(UserCheckNIMRequest $request){
        try {
            $respponse = $this->userService->checkNIM($request);
            return redirect()->route("guest.user.account-register" ,["mahasiswa" => $respponse->mahasiswa]);
        }catch (ValidationExcepton $exception){
            return back()->with("error", $exception->getMessage())->withInput($request->all());
        }
    }

    public function accountRegister(Mahasiswa $mahasiswa){

        if (isset($mahasiswa->user_id)){
            return redirect()->route("guest.index");
        }

        $data = [
            "title" => "Registrasi Akun",
            "mahasiswa" =>  $mahasiswa
        ];
        return view("guest.user.account-register", $data);
    }

    public function accountRegisterPost(UserAccountRegisterRequest $request, Mahasiswa $mahasiswa){
        try {
            $respponse = $this->userService->accountRegister($request,$mahasiswa);
            return redirect()->route("admin.mahasiswa.index")->with("success", "Berhasil mendaftar akun");
        }catch (ValidationExcepton $exception){
            return back()->with("error", $exception->getMessage())->withInput($request->all());
        }
    }

    public function login(){
        $data = [
            "title" => "Login Seminar KP"
        ];
        return view("guest.user.login", $data);
    }

    public function loginPost(UserLoginRequest $request){
        try {
            $respponse = $this->userService->login($request);
            return redirect()->route("admin.mahasiswa.index")->with("success", "Berhasil login");
        }catch (ValidationExcepton $exception){
            return back()->with("error", $exception->getMessage())->withInput($request->all());
        }
    }

}
