<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ValidationExcepton;
use App\Http\Controllers\Controller;
use App\Http\Requests\MahasiswaAddRequest;
use App\Http\Requests\MahasiswaEditRequest;
use App\Http\Requests\MahasiswaImportRequest;
use App\Model\Mahasiswa;
use App\Service\Impl\MahasiswaServiceImpl;
use App\Service\MahasiswaService;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class MahasiswaController extends Controller
{

    private MahasiswaService $mahasiswaService;

    public function __construct()
    {
        $this->mahasiswaService = new MahasiswaServiceImpl();
    }


    public function index(){
        $mahasiswa = Mahasiswa::paginate(10);
        $data = [
            "title" => "Data Mahasiswa",
            "mahasiswa" => $mahasiswa
        ];
        return view("admin.mahasiswa.index", $data);
    }

    public function add(){
        $angkatan = $this->angkatan();
        $data = [
            "title" => "Data Mahasiswa",
            "angkatan" => $angkatan
        ];
        return view("admin.mahasiswa.add", $data);
    }

    public function addPost(MahasiswaAddRequest $request){
        try {
            $respponse = $this->mahasiswaService->add($request);
            return redirect()->route("admin.mahasiswa.index")->with("success", "Berhasi menambah data");
        }catch (ValidationExcepton $exception){
            return back()->with("error", $exception->getMessage())->withInput($request->all());
        }
    }

    public function delete(string $nim){
        try {
            $this->mahasiswaService->delete($nim);
            return back()->with("success", "Berhasi menghapus data");
        }catch (Exception $exception){
            return back()->with("error", $exception->getMessage());
        }
    }

    public function edit(string $nim){
        $angkatan = $this->angkatan();
        $mahasiswa = Mahasiswa::find($nim);
        $data = [
            "title" => "Edit Data Mahasiswa",
            "mahasiswa" => $mahasiswa,
            "angkatan" => $angkatan
        ];

        return view("admin.mahasiswa.edit", $data);
    }

    public function editPost(MahasiswaEditRequest $request, string $nim){
        try {
            $respponse = $this->mahasiswaService->edit($request, $nim);
            return  redirect()->route("admin.mahasiswa.index")->with("success", "Berhasi megedit data" . $respponse->mahasiswa->nama);
        }catch (Exception $exception){
            return back()->with("error", $exception->getMessage())->withInput($request->all());
        }
    }

    public function search(Request $request){
        $key = $request->key;

        $mahasiswa = Mahasiswa::where("nim","like","%".$key."%")
            ->orWhere("nama","like","%".$key."%")
            ->paginate(10);

        $data = [
            "title" => "Data Mahasiswa",
            "mahasiswa" => $mahasiswa
        ];
        return view("admin.mahasiswa.index", $data);
    }

    public function importPost(MahasiswaImportRequest $request){
        try {
            $respponse = $this->mahasiswaService->import($request);
            return  redirect()->route("admin.mahasiswa.index")->with("success", "Berhasi import data");
        }catch (Exception $exception){
            return back()->with("error", $exception->getMessage())->withInput($request->all());
        }
    }

    private function angkatan()
    {
        $angkatan = [];
        $yearNow = (int) date('Y');
        for($i = 0; $i < 8 ; $i++){
            $angkatan[$i] = $yearNow--;
        }

        return $angkatan;
    }

}
