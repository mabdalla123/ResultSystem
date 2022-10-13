<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Auth\UserRegisterRequest;
use App\Models\Student;

class StudentRegisterController extends Controller
{
    public function __invoke(UserRegisterRequest $request)
    {
        //Register All Students
        $student = Student::create($request->validated());

        return response(
            [
                'Student' => $student,
            ],
            status: 200
        );
    }
}
