<?php

namespace App\Filament\Resources\ResultResource\Pages;

use Filament\Pages\Actions;
use App\Actions\Result\ResultActions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ResultResource;

class EditResult extends EditRecord
{
    protected static string $resource = ResultResource::class;


    protected function afterSave(): void
    {
        // calculate persentage
        ResultActions::SetTotalAverage($this->record);

    }




    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
