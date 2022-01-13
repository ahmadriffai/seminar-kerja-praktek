<?php

namespace App\Util;

use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GenerateQRUtil
{
    public static function generate(string $content, string $name):string
    {
        $qr = QrCode::format("svg")->generate($content);

        $path = "/qr_code/" . $name .".svg";

        File::put( public_path() . "/qr_code/" . $name .".svg", $qr);
        // Storage::disk("public")->put("qrcode/". $name .".svg", $qr);

        return $path;
    }
}
