<?php

namespace App\Http\Controllers\Api\v1\Department;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Department\CreateRequest;
use App\Models\Department;

class create extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $dept = Department::create($request->validated());

        return response(
            [
                'department' => $dept,
            ],
            200
        );
    }
}
