<?php

namespace App\Filament\Resources\ResultResource\Pages;

use App\Actions\Result\ResultActions;
use App\Filament\Resources\ResultResource;
use App\Models\Result;
use Filament\Resources\Pages\CreateRecord;

class CreateResult extends CreateRecord
{
    protected static string $resource = ResultResource::class;

    protected function afterCreate(): void
    {
        //check if Result is Created with all it's Details

        if (ResultActions::checkCreatedSuccssfuly($this->record)) {
            //calculate total Average
            ResultActions::SetTotalAverage($this->record);
        }
    }
}
