<?php

namespace App\Http\Controllers\Api\v1\AcadimicYear;

use App\Http\Controllers\Controller;
use App\Models\AcadimicYear;

class Show extends Controller
{
    public function __invoke(AcadimicYear $acadimicYear)
    {
        return response(
            [
                'acadimicYear' => $acadimicYear,
            ],
            200
        );
    }
}
