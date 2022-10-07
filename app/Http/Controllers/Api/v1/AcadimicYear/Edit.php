<?php

namespace App\Http\Controllers\Api\v1\AcadimicYear;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\AcadimicYear\AcadimicYearUpdateRequest;
use App\Models\AcadimicYear;
use Illuminate\Http\Request;

class Edit extends Controller
{
    public function __invoke(AcadimicYearUpdateRequest $request,AcadimicYear $acadimicYear)
    {
        $acadimicYear->update($request->validated());
        return response(
            [
                "acadimicyear" => $acadimicYear
            ],
            200
        );
    }
}
