<?php

namespace App\Http\Controllers\Api\v1\Result;

use App\Http\Controllers\Controller;
use App\Models\Result;

class Show extends Controller
{
    public function __invoke(Result $result)
    {
        return response(
            [
                'result' => $result,
            ],
            200
        );
    }
}
