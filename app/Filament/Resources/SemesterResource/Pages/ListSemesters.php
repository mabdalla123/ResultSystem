<?php

namespace App\Filament\Resources\SemesterResource\Pages;

use App\Filament\Resources\SemesterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSemesters extends ListRecords
{
    protected static string $resource = SemesterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
