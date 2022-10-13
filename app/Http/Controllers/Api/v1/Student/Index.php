<?php

namespace App\Http\Controllers\Api\v1\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;

class Index extends Controller
{
    public function __invoke()
    {
        $students = Student::all();

        return response(
            [
                'students' => $students,
            ],
            200
        );
    }
}
