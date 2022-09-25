<?php

namespace App\Filament\Resources\AcadimicYearResource\Pages;

use App\Filament\Resources\AcadimicYearResource;
use App\Models\AcadimicYear;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAcadimicYear extends EditRecord
{
    protected static string $resource = AcadimicYearResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }


    protected function afterSave(){
        //make sure there is only one Current Acadimic Year
        if($this->record->current){
            //mass update and all othere records

            AcadimicYear::where("id","<>",$this->record->id)
                        ->update([
                            "current"=>false
                        ]);
        }
    }
}
