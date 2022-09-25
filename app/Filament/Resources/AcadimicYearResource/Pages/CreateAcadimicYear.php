<?php

namespace App\Filament\Resources\AcadimicYearResource\Pages;

use Filament\Pages\Actions;
use App\Models\AcadimicYear;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\AcadimicYearResource;

class CreateAcadimicYear extends CreateRecord
{
    protected static string $resource = AcadimicYearResource::class;

    protected function afterCreate()
    {
        //make sure there is only one Current Acadimic Year
        if ($this->record->current) {
            //mass update and all othere records

            AcadimicYear::where("id", "<>", $this->record->id)
                ->update([
                    "current" => false
                ]);
        }
    }
}
