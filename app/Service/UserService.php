<?php

namespace App\Service;

use App\Http\Requests\UserAccountRegisterRequest;
use App\Http\Requests\UserCheckNIMRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Response\UserResponse;
use App\Model\Mahasiswa;

interface UserService
{
    public function checkNIM(UserCheckNIMRequest $request): UserResponse;
    public function accountRegister(UserAccountRegisterRequest $request, Mahasiswa $mahasiswa): UserResponse;
    public function login(UserLoginRequest $request): UserResponse;
}
