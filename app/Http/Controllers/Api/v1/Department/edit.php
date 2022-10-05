<?php

namespace App\Http\Controllers\Api\v1\Department;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Department\EditRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class edit extends Controller
{
    public function __invoke(EditRequest $request,Department $department)
    {
        $department->update($request->validated());
        return response([
            "department"=>$department
        ],
        200
    );
    }
}
