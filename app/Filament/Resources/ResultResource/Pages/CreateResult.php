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


//     protected function beforeCreate():void
//     {
//         //  check if this std already had a result in this semester
//
//         $result = Result::where("semester_id",$this->data["semester_id"])
//         ->where("student_id",$this->data["student_id"])->count();
//
//             if($result != 0 ){
//                 Notification::make()
//                 ->title("Student already has a result in this semester")
//                 ->danger()
//                 ->send();
//
//                 //to do (abort creation if this is true)
//                  back();
//
//             }
//
//
//     }






}
