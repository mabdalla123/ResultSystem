<?php

namespace App\Http\Controllers\Api\v1\Semester;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Semester\SemesterCreateRequest;
use App\Models\Semester;

class Create extends Controller
{
    public function __invoke(SemesterCreateRequest $request)
    {
        $semester = Semester::create($request->validated());

        return response(
            [
                'semester' => $semester,
            ],
            200
        );
    }
}
