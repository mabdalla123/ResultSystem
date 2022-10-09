<?php

namespace App\Http\Controllers\Api\v1\Result\Detail;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\ResultDetail;
use Illuminate\Http\Request;

class Delete extends Controller
{
    public function __invoke(Result $result , ResultDetail $resultDetail)
    {
        $resultDetail->delete();
        return response(
            [
                "message" => "Item Deleted"
            ],
            200
        );
    }
}
