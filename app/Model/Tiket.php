<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = "tiket";
    protected $fillable = ["id", "tiket","harga"];
}
