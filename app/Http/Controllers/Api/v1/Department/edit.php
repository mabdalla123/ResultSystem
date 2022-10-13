<?php

namespace App\Http\Controllers\Api\v1\Department;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Department\EditRequest;
use App\Models\Department;

class edit extends Controller
{
    public function __invoke(EditRequest $request, Department $department)
    {
        try {
            $department->update($request->validated());

            return response(
                [
                    'department' => $department,
                ],
                200
            );
        } catch(Excption $ex) {
            return response($ex);
        }
    }
}
