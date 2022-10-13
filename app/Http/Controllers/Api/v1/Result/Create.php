<?php

namespace App\Http\Controllers\Api\v1\Result;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Result\ResultCreateRequest;
use App\Http\Resources\Api\v1\Result\ResultResource;
use App\Models\Result;

class Create extends Controller
{
    public function __invoke(ResultCreateRequest $request)
    {
        $data = $request->validated();
        //  return $data->details;
        $result = Result::create($data);
        $id = $result->id;
        $result->details()->createMany($data['details']);

        return response(
            [
                'result' => new ResultResource(Result::where('id', $id)->with('details')->get()),
            ],
            200
        );
    }
}
