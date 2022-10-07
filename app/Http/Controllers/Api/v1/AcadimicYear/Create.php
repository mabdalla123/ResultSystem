<?php

namespace App\Http\Controllers\Api\v1\AcadimicYear;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\AcadimicYear\AcadimicYearCreateRequest;
use App\Models\AcadimicYear;
use Illuminate\Http\Request;

class Create extends Controller
{
    public function __invoke(AcadimicYearCreateRequest $request)
    {
        $acadimicyear = AcadimicYear::create($request->validated());
        return response(
            [
                "acadimicyear" => $acadimicyear
            ],
            200
        );
    }
}
