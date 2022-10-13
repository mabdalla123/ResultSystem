<?php

namespace App\Http\Controllers\Api\v1\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Student\StudentCreateRequest;
use App\Models\Student;

class Create extends Controller
{
    public function __invoke(StudentCreateRequest $request)
    {
        $student = Student::create($request->validated());

        return response(
            [
                'student' => $student,
            ],
            200
        );
    }
}
