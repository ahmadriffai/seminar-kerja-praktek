<?php

namespace App\Service\Impl;

use App\Exceptions\ValidationExcepton;
use App\Model\Mahasiswa;
use App\Model\Session;
use App\Service\SessionService;
use App\Util\RandomUtil;

class SessionServiceImpl implements SessionService
{

    public static string $COOKIE_NAME = "X-SEMINAR-KP";

    public function create(string $userId): Session
    {
        $session = new Session();
        $session->id = RandomUtil::generate("SES",10);
        $session->user_id = $userId;
        $session->save();

        setcookie(self::$COOKIE_NAME, $session->id, time() + (60 * 60 * 24 * 30), "/");

        return $session;
    }

    public function currentMahasiswa(): ?Mahasiswa
    {
        $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? "";
        $session = Session::find($sessionId);

        if (!$session){
            return null;
        }

        $mahasiswa = Mahasiswa::where("user_id", $session->user_id)->first();

        return $mahasiswa;
    }

    public function destroy(): void
    {
        $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? "";
        $session = Session::find($sessionId);
        if ($session == null){
            throw new ValidationExcepton("error");
        }
        $session->delete();
        setcookie(self::$COOKIE_NAME, '', 1, "/");
    }
}
