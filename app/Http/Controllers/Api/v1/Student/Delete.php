<?php

namespace App\Http\Controllers\Api\v1\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;

class Delete extends Controller
{
    public function __invoke(Student $student)
    {
        $student->delete();

        return response(
            [
                'message' => 'Item Deleted',
            ],
            200
        );
    }
}
