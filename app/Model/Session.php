<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    //
    protected $table = "session";
    public $incrementing = false;
    protected $keyType = "string";
    protected $fillable = ["id", "user_id"];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
