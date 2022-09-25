<?php

namespace App\Filament\Resources\ResultResource\Pages;

use App\Filament\Resources\ResultResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResult extends EditRecord
{
    protected static string $resource = ResultResource::class;


    protected function afterSave(): void
    {
        // calculate persentage

        $sum = 0;
        $data =  $this->record->details->map(function ($detail) use ($sum){ return  $sum +=$detail->avarege;});

        foreach($data as $item){
            $sum+=$item;
        }

        $fullmark = count($data)*100;

        $finalAvarege = $sum/$fullmark*100;

        $this->record->average= $finalAvarege;
        $this->record->save();
    }




    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
