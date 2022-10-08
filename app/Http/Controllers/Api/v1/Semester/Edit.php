<?php

namespace App\Http\Controllers\Api\v1\Semester;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Semester\SemesterUpdateRequest;
use App\Models\Semester;
use Illuminate\Http\Request;

class Edit extends Controller
{
    public function __invoke(SemesterUpdateRequest $request,Semester $semester)
    {
        $semester->update($request->validated());
        return response(
            [
                "semester" => $semester
            ],
            200
        );
    }
}
