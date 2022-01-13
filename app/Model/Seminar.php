<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    protected $table = "seminar";
    protected $keyType = "string";
    public $incrementing = false;
    protected $fillable = ["id","nama_seminar","deskripsi","tanggal_mulai","tanggal_selesai","lokasi", "gambar", "kuota","selesai"];


    public function mahasiswa(){
        return $this->belongsToMany(Mahasiswa::class,"peserta_seminar", "seminar_id","nim")
            ->withPivot("is_hadir","is_bayar","qr_code");
    }

}
