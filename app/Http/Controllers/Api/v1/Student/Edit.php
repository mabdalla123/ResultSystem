<?php

namespace App\Http\Controllers\Api\v1\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Student\StudentUpdateRequest;
use App\Models\Student;

class Edit extends Controller
{
    public function __invoke(StudentUpdateRequest $request, Student $student)
    {
        $student->update($request->validated());

        return response(
            [
                'student' => $student,
            ],
            200
        );
    }
}
