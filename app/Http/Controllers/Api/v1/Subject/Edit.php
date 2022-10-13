<?php

namespace App\Http\Controllers\Api\v1\Subject;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Subject\SubjectUpdateRequest;
use App\Models\Subject;

class Edit extends Controller
{
    public function __invoke(SubjectUpdateRequest $request, Subject $subject)
    {
        $subject->update($request->validated());

        return response(
            [
                'subject' => $subject,
            ],
            200
        );
    }
}
