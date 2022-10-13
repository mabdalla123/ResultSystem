<?php

namespace App\Http\Controllers\Api\v1\Subject;

use App\Http\Controllers\Controller;
use App\Models\Subject;

class Delete extends Controller
{
    public function __invoke(Subject $subject)
    {
        $subject->delete();

        return response(
            [
                'message' => 'Item Deleted',
            ],
            200
        );
    }
}
