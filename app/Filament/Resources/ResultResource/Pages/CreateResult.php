<?php

namespace App\Filament\Resources\ResultResource\Pages;

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
        $sum = 0;
        $data =  $this->record->details->map(function ($detail) use ($sum) {
            return  $sum += $detail->avarege;
        });

        foreach ($data as $item) {
            $sum += $item;
        }

        $fullmark = count($data) * 100;

        $finalAvarege = $sum / $fullmark * 100;

        $this->record->average = $finalAvarege;

        $this->record->save();
    }

}
