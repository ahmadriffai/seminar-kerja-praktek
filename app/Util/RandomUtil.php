<?php

namespace App\Util;

class RandomUtil
{
    public static function generate(string $prefix = "",int $length = 5) :string
    {
        $random = '';
        for ($i = 0; $i < $length; $i++) {
            $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
        }
        return strtoupper($prefix . $random);
    }
}
