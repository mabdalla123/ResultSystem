<?php

namespace App\Http\Controllers\Api\v1\Semester;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;

class Show extends Controller
{
    public function __invoke(Semester $semester)
    {

        return response(
            [
                "semester" => $semester
            ],
            200
        );
    }
}
