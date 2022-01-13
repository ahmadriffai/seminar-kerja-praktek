<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ValidationExcepton;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeminarAddRequest;
use App\Model\Seminar;
use App\Service\Impl\SeminarServiceImpl;
use App\Service\SeminarService;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
    private SeminarService $seminarService;

    public function __construct()
    {
        $this->seminarService = new SeminarServiceImpl();
    }


    public function index(){

        $seminar = Seminar::orderBy("created_at", "DESC")->paginate(10);

        $data = [
            "title" => "Daftar Seminar Kerja Praktek",
            "seminar" => $seminar
        ];

        return view("admin.seminar.index", $data);
    }

    public function add()
    {
        $data = [
            "title" => "Buat Seminar Kerja Praktek"
        ];
        return view("admin.seminar.add", $data);
    }

    public function addPost(SeminarAddRequest $request){
        try {
            $respponse = $this->seminarService->add($request);
            return redirect()->route("admin.seminar.index")->with("success", "Berhasi membuat seminar");
        }catch (ValidationExcepton $exception){
            return back()->with("error", $exception->getMessage())->withInput($request->all());
        }
    }
}
