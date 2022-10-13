<?php

namespace App\Http\Controllers\Api\v1\Semester;

use App\Http\Controllers\Controller;
use App\Models\Semester;

class Delete extends Controller
{
    public function __invoke(Semester $semester)
    {
        $semester->delete();

        return response(
            [
                'Message' => 'Item Deleted',
            ],
            200
        );
    }
}
