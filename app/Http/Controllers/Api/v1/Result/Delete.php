<?php

namespace App\Http\Controllers\Api\v1\Result;

use App\Http\Controllers\Controller;
use App\Models\Result;

class Delete extends Controller
{
    public function __invoke(Result $result)
    {
        $result->delete();

        return response(
            [
                'message' => 'Item Deleted',
            ],
            200
        );
    }
}
