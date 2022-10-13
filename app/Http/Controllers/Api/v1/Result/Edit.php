<?php

namespace App\Http\Controllers\Api\v1\Result;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Result\ResultUpdateRequest;
use App\Models\Result;

class Edit extends Controller
{
    public function __invoke(ResultUpdateRequest $request, Result $result)
    {
        $result->update($request->validated());

        return response(
            [
                'result' => $result,
            ],
            200
        );
    }
}
