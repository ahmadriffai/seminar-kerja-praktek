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


    public function seminar(){
        return $this->belongsToMany(Seminar::class,"peserta_seminar","nim","seminar_id")
            ->using(PesertaSeminar::class)->withPivot("qr_code","is_bayar","is_hadir","tiket_id","created_at");
    }
}
