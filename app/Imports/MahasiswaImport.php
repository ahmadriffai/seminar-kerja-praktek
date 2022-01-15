<?php

namespace App\Imports;


use App\Model\Mahasiswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MahasiswaImport implements ToCollection, WithStartRow
{


    public function collection(Collection $collection)
    {

        // dd($collection);

        foreach ($collection as $row){

            if ($row[0] == null ){
                continue;
            }else{
                Mahasiswa::updateOrCreate([
                    "nim" => $row[1]
                ],[
                    "nim" => $row[1],
                    "nama" => $row[2],
                    "prodi" => $row[4],
                    "angkatan" => (int)$row[3],
                    "nomer_telp" => $row[5],
                    "user_id" => null
                ]);
            }
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
