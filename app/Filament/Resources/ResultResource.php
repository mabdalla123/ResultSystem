<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResultResource\Pages;
use App\Filament\Resources\ResultResource\RelationManagers;
use App\Models\Department;
use App\Models\Result;
use App\Models\Semester;
use App\Models\Subject;
use Closure;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ResultResource extends Resource
{
    protected static ?string $model = Result::class;

    protected static ?string $navigationGroup = 'Operations';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([


                Forms\Components\Select::make("department_id")
                    ->label("Department")
                    ->options(function () {
                        return Department::all()->pluck("name", "id");
                    })
                    ->reactive()
                    ->columnSpan([
                        "md" => 1
                    ])
                    ->afterStateUpdated(
                        fn (callable $set) => $set("semester_id", null)
                    )
                    ->required(),
                Forms\Components\Select::make("semester_id")
                    ->relationship("semester", "name")
                    ->reactive()
                    ->columnSpan([
                        "md" => 1
                    ])
                    ->afterStateUpdated(
                        fn (callable $set) => $set("subject_id", null)
                    )
                    ->required(),
                Forms\Components\Select::make("student_id")
                    ->relationship("student", "name")
                    ->reactive()
                    ->columnSpan([
                        "md" => 1
                    ])
                    ->required()
                    ->afterStateUpdated(function (callable $get, $set) {

                        $result = Result::where("semester_id", $get("semester_id"))
                            ->where("student_id", $get("student_id"))->count();

                        if ($result != 0) {

                            Notification::make()
                                ->title("Student already has a result in this semester")
                                ->danger()
                                ->send();

                            return back();
                        }
                    }),
                Forms\Components\TextInput::make("average")
                    ->columnSpan([
                        "md" => 1
                    ])
                    ->label("Percentage %")
                    ->disabled(),

                Forms\Components\Card::make()->schema([
                    Forms\Components\Placeholder::make('Result details'),
                    Forms\Components\Repeater::make('details')
                        ->label("subjects")
                        ->relationship('details')
                        ->schema([
                            Forms\Components\Select::make('subject_id')
                                ->label("subjects")
                                ->reactive()
                                ->required()
                                ->options(
                                    function (callable $get) {

                                        $semester = Semester::find($get("../../semester_id"));
                                        if ($semester) {
                                            return $semester->subjects
                                                ->pluck("name", "id");
                                        } else {

                                            return [

                                            ];
                                        }
                                    }
                                ),

                            Forms\Components\TextInput::make('avarege')
                                ->required()
                                ->minValue(0)
                                ->maxValue(100),
                            Forms\Components\TextInput::make('student_certified_hours')
                                ->required(),

                        ])->minItems(function (callable $get) {
                            $semester = Semester::find($get("semester_id"));
                            if ($semester) {
                                return $semester->subjects
                                    ->count();
                            } else {

                                return 0;
                            }
                        })
                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('student.name'),
                Tables\Columns\TextColumn::make('semester.name'),
                Tables\Columns\TextColumn::make('semester.acadimicyear.name'),
                Tables\Columns\TextColumn::make('semester.acadimicyear.department.name'),

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
            'index' => Pages\ListResults::route('/'),
            'create' => Pages\CreateResult::route('/create'),
            'edit' => Pages\EditResult::route('/{record}/edit'),
        ];
    }
}
