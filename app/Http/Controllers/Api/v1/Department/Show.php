<?php

namespace App\Http\Controllers\Api\v1\Department;

use App\Http\Controllers\Controller;
use App\Models\Department;

class Show extends Controller
{
    public function __invoke(Department $department)
    {
        return response(
            [
                'department' => $department,
            ],
            200
        );
    }
}
