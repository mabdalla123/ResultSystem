<?php

namespace App\Http\Controllers\Api\v1\Result\Detail;

use App\Http\Controllers\Controller;
use App\Models\Result;

class Index extends Controller
{
    public function __invoke(Result $result)
    {
        return response(
            [
                'Result Details' => $result->details,
            ],
            200
        );
    }
}
