<?php

namespace App\Http\Controllers\Api\v1\Department;

use App\Models\Department;
use App\Http\Controllers\Controller;

class Show extends Controller
{
    public function __invoke(Department $department)
    {

        return response(
            [
                "department" => $department
            ],
            200
        );
    }
}
