<?php

namespace App\Filament\Resources\ResultResource\Pages;

use App\Actions\Result\ResultActions;
use App\Filament\Resources\ResultResource;
use App\Models\Result;
use Exception;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateResult extends CreateRecord
{
    protected static string $resource = ResultResource::class;

    protected function afterCreate(): void
    {
        //calculate total git
        ResultActions::SetTotalAverage( $this->record);
    }



}
