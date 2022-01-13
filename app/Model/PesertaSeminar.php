<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PesertaSeminar extends Pivot
{
    //
    protected $table = "seminar";
    public $incrementing = true;
    protected $fillable = ["id","nim","seminar_id","qr_code","is_bayar","is_hadir", "tiket_id"];


}
