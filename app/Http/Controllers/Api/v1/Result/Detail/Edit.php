<?php

namespace App\Http\Controllers\Api\v1\Result\Detail;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Result\ResultDetailUpdateRequest;
use App\Models\Result;
use App\Models\ResultDetail;

class Edit extends Controller
{
    public function __invoke(ResultDetailUpdateRequest $request, Result $result, ResultDetail $resultDetail)
    {
        $resultDetail->update($request->validated());

        return response(
            [
                'Result Detail' => $resultDetail,
            ],
            200
        );
    }
}
