<?php

namespace App\Http\Controllers\Api\v1\Subject;

use App\Http\Controllers\Controller;
use App\Models\Subject;

class Index extends Controller
{
    public function __invoke()
    {
        $subjects = Subject::all();

        return response(
            [
                'subjects' => $subjects,
            ],
            200
        );
    }
}
