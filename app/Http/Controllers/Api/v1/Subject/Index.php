<?php

namespace App\Http\Controllers\Api\v1\Subject;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function __invoke()
    {
        $subjects = Subject::all();
        return response(
            [
                "subjects" => $subjects
            ],
            200
        );
    }
}
