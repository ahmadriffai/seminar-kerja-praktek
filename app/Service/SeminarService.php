<?php

namespace App\Service;

use App\Http\Requests\SeminarAddRequest;
use App\Http\Response\SeminarResponse;

interface SeminarService
{
    public function add(SeminarAddRequest $request): SeminarResponse;
}
