<?php

namespace App\Filament\Resources\AcadimicYearResource\Pages;

use App\Filament\Resources\AcadimicYearResource;
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
}
