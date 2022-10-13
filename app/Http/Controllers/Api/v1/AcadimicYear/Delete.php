<?php

namespace App\Http\Controllers\Api\v1\AcadimicYear;

use App\Http\Controllers\Controller;
use App\Models\AcadimicYear;

class Delete extends Controller
{
    public function __invoke(AcadimicYear $acadimicYear)
    {
        $acadimicYear->delete();

        return response(
            [
                'Message' => 'Item Deleted',
            ],
            200
        );
    }
}
