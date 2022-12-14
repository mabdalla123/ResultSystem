<?php

namespace App\Http\Controllers\Api\v1\Semester;

use App\Http\Controllers\Controller;
use App\Models\Semester;

class Index extends Controller
{
    public function __invoke()
    {
        $semesters = Semester::all();

        return response(
            [
                'semesters' => $semesters,
            ],
            200
        );
    }
}
