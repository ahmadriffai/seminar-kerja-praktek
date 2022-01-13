<?php

namespace App\Util;

use App\Exceptions\ValidationExcepton;
use Illuminate\Support\Facades\Storage;

class UploadFileUtil
{

    public static function upload($file, string $lokasi){
        if ($file){

            $filename = uniqid("SM");
            $extension = $file->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'.time() .'.'.$extension;

            $file->move("$lokasi/", $filenameSimpan);

            return $lokasi."/".$filenameSimpan;

        }else{
            throw new ValidationExcepton("Gagal upload file");
        }

    }

    public static function cancelUpload($fileNameSimpan){
        Storage::delete($fileNameSimpan);
    }

}
