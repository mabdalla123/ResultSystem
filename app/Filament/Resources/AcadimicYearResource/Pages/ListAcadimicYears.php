<?php

namespace App\Filament\Resources\AcadimicYearResource\Pages;

use App\Filament\Resources\AcadimicYearResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAcadimicYears extends ListRecords
{
    protected static string $resource = AcadimicYearResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
