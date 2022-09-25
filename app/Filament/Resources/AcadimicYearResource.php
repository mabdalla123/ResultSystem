<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AcadimicYearResource\Pages;
use App\Filament\Resources\AcadimicYearResource\RelationManagers;
use App\Models\AcadimicYear;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Table as TablesTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AcadimicYearResource extends Resource
{
    protected static ?string $model = AcadimicYear::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make("name"),
                Forms\Components\Checkbox::make("current"),
                Forms\Components\Select::make("department_id")->relationship("department","name"),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('department.name'),
                Tables\Columns\BooleanColumn::make("current"),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAcadimicYears::route('/'),
            'create' => Pages\CreateAcadimicYear::route('/create'),
            'edit' => Pages\EditAcadimicYear::route('/{record}/edit'),
        ];
    }
}
