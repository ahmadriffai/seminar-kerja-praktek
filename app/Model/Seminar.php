<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    protected $table = "seminar";
    protected $keyType = "string";
    public $incrementing = false;
    protected $fillable = ["id","nama_seminar","deskripsi","tanggal_mulai","tanggal_selesai","lokasi", "gambar", "kuota","selesai"];


    public function seminar(){
        $this->belongsToMany(Mahasiswa::class,"peserta_seminar")->withPivot("creted_at");
    }

}
