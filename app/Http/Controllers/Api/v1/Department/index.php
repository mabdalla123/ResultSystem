<?php

namespace App\Http\Controllers\Api\v1\Department;

use App\Http\Controllers\Controller;
use App\Models\Department;

class index extends Controller
{
    //return all Departments
    public function __invoke()
    {
        $departments = Department::all();

        return response(
            [
                'departments' => $departments,
            ],
            200
        );
    }
}
