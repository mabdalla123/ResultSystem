<?php

namespace App\Http\Controllers\Api\v1\Subject;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class Show extends Controller
{
    public function __invoke(Subject $subject)
    {
        return response(
            [
                "subject" => $subject
            ],
            200
        );
    }
}
