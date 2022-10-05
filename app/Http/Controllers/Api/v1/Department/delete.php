<?php

namespace App\Http\Controllers\Api\v1\Department;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class delete extends Controller
{
    public function __invoke(Department $department)
    {
        $department->delete();
        return response([
            "message"=>"Item Deleted"
        ],
        200
    );
    }
}
