<?php

namespace App\Service;

use App\Model\Mahasiswa;
use App\Model\Session;

interface SessionService
{
    public function create(string $userId): Session;
    public function currentMahasiswa(): ?Mahasiswa;
    public function destroy(): void;
//    public function currentAdmin() : ?Admin;
}
