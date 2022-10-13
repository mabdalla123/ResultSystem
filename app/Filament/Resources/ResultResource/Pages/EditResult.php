<?php

namespace App\Filament\Resources\ResultResource\Pages;

use App\Actions\Result\ResultActions;
use App\Filament\Resources\ResultResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

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
