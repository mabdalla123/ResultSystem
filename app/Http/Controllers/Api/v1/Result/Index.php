<?php

namespace App\Http\Controllers\Api\v1\Result;

use App\Http\Controllers\Controller;
use App\Models\Result;

class Index extends Controller
{
    public function __invoke()
    {
        $results = Result::all();

        return response(
            [
                'results' => $results,
            ],
            200
        );
    }
}
