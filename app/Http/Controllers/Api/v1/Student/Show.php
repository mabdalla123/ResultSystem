<?php

namespace App\Http\Controllers\Api\v1\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;

class Show extends Controller
{
    public function __invoke(Student $student)
    {
        return response(
            [
                'student' => $student,
            ],
            200
        );
    }
}
