<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "user";
    protected $keyType = "string";
    public $incrementing = false;
    protected $fillable = ["id","username","email","password","role"];
}
