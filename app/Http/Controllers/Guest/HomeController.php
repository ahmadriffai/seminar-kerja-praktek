<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Model\Seminar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $seminar = Seminar::orderBy("created_at", "DESC")->limit(3)->get();
        $data = [
            "title" => "Landing - Seminar Kerja Praktek",
            "seminar" => $seminar
        ];
        return view("guest.index", $data);
    }
}
