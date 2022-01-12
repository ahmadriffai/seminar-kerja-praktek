<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = "mahasiswa";
    protected $primaryKey = "nim";
    protected $keyType = "string";
    public $incrementing = false;
    protected $fillable = ["nim","nama","prodi","angkatan","nomer_telp","user_id"];
}
