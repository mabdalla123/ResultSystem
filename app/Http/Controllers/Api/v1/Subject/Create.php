<?php

namespace App\Http\Controllers\Api\v1\Subject;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Subject\SubjectCreateRequest;
use App\Models\Subject;
use Illuminate\Http\Request;

class Create extends Controller
{
    public function __invoke(SubjectCreateRequest $request)
    {
        $subject = Subject::create($request->validated());
        return response(
            [
                "subject" => $subject
            ],
            200
        );
    }
}
