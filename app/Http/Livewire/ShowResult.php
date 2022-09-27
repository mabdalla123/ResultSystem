<?php

namespace App\Http\Livewire;

use App\Models\Department;
use App\Models\Result;
use Livewire\Component;
use App\Models\Semester;
use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

class ShowResult extends Component implements HasForms
{

    use InteractsWithForms;

     public  $result;

    public function mount( $result)
    {


        $this->result = Result::find($result);
        $this->form->fill();

    }
    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Select::make("department")
                ->label("Department")
                ->options(function () {
                    return Department::all()->pluck("name", "id");
                })
                ->reactive()
                ->columnSpan([
                    "md" => 1
                ])
                ->afterStateUpdated(
                    fn (callable $set) => $set("acadimicyear_id", null)
                )
                ->required(),
            Forms\Components\Select::make("acadimicyear_id")
                ->options(function (callable $get) {

                    $department = Department::find($get("department"));

                    if ($department && $department->acadimicyear()->where("current", true)) {
                        return $department->acadimicyear()->where("current", true)->pluck("name", "id");
                    }

                    return [];
                })
                ->reactive()
                ->columnSpan([
                    "md" => 1
                ])
                ->afterStateUpdated(
                    fn (callable $set) => $set("semester", null)
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
                ,
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
                                            // ->whereNotIn("subject_id", "<>", $get("subject_id"))
                                            ->pluck("name", "id");
                                    } else {

                                        return [];
                                    }
                                }
                            )
                        // ->relationship("subjects","name")
                        ,
                        Forms\Components\TextInput::make('avarege')
                            ->required()
                            ->minValue(0)
                            ->maxValue(100),

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
        ];
    }





    protected function getFormModel()
    {
        return $this->result;
    }



    public function render()
    {
        return view('livewire.show-result');
    }
}
