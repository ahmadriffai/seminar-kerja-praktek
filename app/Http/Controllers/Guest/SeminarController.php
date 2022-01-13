<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Model\Seminar;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
    public function detail(string $id){
        $seminar = Seminar::find($id);
        $data = [
            "title" => "Detail Seminar",
            "seminar" => $seminar
        ];
        return view("guest.seminar.detail", $data);
    }
}
