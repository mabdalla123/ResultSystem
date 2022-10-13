<?php

namespace App\Http\Controllers\Api\v1\AcadimicYear;

use App\Http\Controllers\Controller;
use App\Models\AcadimicYear;

class Index extends Controller
{
    public function __invoke()
    {
        $acadimicYear = AcadimicYear::all();

        return response(
            [
                'acadimicYear' => $acadimicYear,
            ],
            200
        );
    }
}
