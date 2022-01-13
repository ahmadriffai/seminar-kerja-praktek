<?php

namespace App\Service\Impl;

use App\Exceptions\ValidationExcepton;
use App\Http\Requests\UserAccountRegisterRequest;
use App\Http\Requests\UserCheckNIMRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Response\UserResponse;
use App\Model\Mahasiswa;
use App\Model\User;
use App\Service\UserService;
use App\Util\RandomUtil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl implements UserService
{

    public function checkNIM(UserCheckNIMRequest $request): UserResponse
    {
        $mahasiswa = Mahasiswa::find($request->nim);


        if ($mahasiswa == null){
            throw new ValidationExcepton("Mahasiswa belum terdaftar, silahkan hubungi admin");
        }


        if ($mahasiswa->user_id != null){
            throw new ValidationExcepton("Anda sudah terdaftar, silahkan login untuk melanjutakan");
        }

        $response = new UserResponse();
        $response->mahasiswa = $mahasiswa;

        return $response;
    }

    public function accountRegister(UserAccountRegisterRequest $request, Mahasiswa $mahasiswa): UserResponse
    {
        try {
            DB::beginTransaction();

            $user = new User();
            $user->id = RandomUtil::generate("U");
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = "MAHASISWA";
            $user->save();

            $mahasiswa->user_id = $user->id;
            $mahasiswa->save();

            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
        }

        $response = new UserResponse();
        $response->user = $user;

        return $response;

    }

    public function login(UserLoginRequest $request): UserResponse
    {
        $user = User::where("username", $request->username)
            ->orWhere("email" , $request->username)->first();


        if (!$user){
            throw new ValidationExcepton("username atau password salah");
        }

        if (Hash::check($request->password, $user->password)){
            $response = new UserResponse();
            $response->user = $user;
            return $response;
        }else{
            throw new ValidationExcepton("username atau password salah");
        }
    }
}
