<?php

namespace App\Http\Controllers\Api\v1\Result\Detail;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\ResultDetail;

class Show extends Controller
{
    public function __invoke(Result $result, ResultDetail $resultDetail)
    {
        return response(
            [
                'Result Detail' => $resultDetail,
            ],
            200
        );
    }
}
