<?php

namespace App\Http\Livewire;

use App\Models\Department;
use App\Models\Result;
use App\Models\Semester;
use App\Models\Subject;
use Exception;
use Livewire\Component;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;

class ShowResult extends Component implements Forms\Contracts\HasForms
{

    use Forms\Concerns\InteractsWithForms;
    public Result $Result;


    public function mount(Result $Result)
    {
        $this->Result = $Result;
        $this->form->fill([]);
    }




    protected function getFormSchema(): array
    {
        return [

            Forms\Components\Select::make("semester_id")
                ->relationship("semester", "name")
                ->reactive()
                ->disabled()

                ->columnSpan([
                    "md" => 1
                ])
               ,
            Forms\Components\Select::make("student_id")
                ->relationship("student", "name")
                ->reactive()
                ->disabled()

                ->columnSpan([
                    "md" => 1
                ])->required(),
            Forms\Components\TextInput::make("average")
                ->columnSpan([
                    "md" => 1
                ])
                ->label("Percentage %")
                ->disabled()
                ->hidden(true),
            Forms\Components\TextInput::make("total_hours")
                ->reactive()
                ->hidden(true)
                ->disabled(),
                
            Forms\Components\TextInput::make("student_hour_point")
                ->reactive()
                ->hidden(true)

                ->disabled(),
            // Forms\Components\TextInput::make("student_total_points")
            //     ->reactive()
            //     ->disabled(),

            Forms\Components\TextInput::make("final_average")
                ->reactive()
                ->disabled()
            // ->afterStateHydrated(function (TextInput $component,callable $get){

            //     $total_hours = $get("total_hours");
            //     $student_total_hours = $get("student_total_hours");
            //     $student_total_points = $get("student_total_points");

            //     $final = $student_total_hours*$student_total_points;

            //     $component->state($total_hours);
            // })
            ,


            Forms\Components\Card::make()->schema(
                [
                    Forms\Components\Placeholder::make('Result details'),
                    Forms\Components\Repeater::make('details')
                        ->label("subjects")
                        ->relationship('details')
                        ->schema([
                            Forms\Components\Select::make('subject_id')
                                ->label("subjects")
                                ->reactive()
                                ->required()
                                ->disabled()
                                ->options(
                                    function (callable $get) {

                                        $semester = Semester::find($get("../../semester_id"));
                                        if ($semester) {
                                            return $semester->subjects
                                                ->pluck("name", "id");
                                        } else {

                                            return [];
                                        }
                                    }
                                )->afterStateHydrated(function ($component, $state, callable $set, callable $get) {
                                    $subject = Subject::find($state);
                                    $count = $get("../../total_hours") + $subject->certified_hours;
                                    $set("../../total_hours", $count);
                                })
                            // ->relationship("subjects","name")
                            , Forms\Components\TextInput::make('avarege')
                                ->reactive()
                                ->disabled()
                                ->afterStateHydrated(function (TextInput $component, $state, callable $set) {
                                    if ($state >= 80 && $state <= 100) {
                                        $component->state("A");
                                        $set("point", 6);
                                    } else if ($state >= 70 && $state <= 79) {
                                        $component->state("B+");
                                        $set("point", 5);
                                    } else if ($state >= 60 && $state <= 69) {
                                        $component->state("B");
                                        $set("point", 4);
                                    } else if ($state >= 55 && $state <= 59) {
                                        $component->state("C+");
                                        $set("point", 3.5);
                                    } else if ($state >= 50 && $state <= 54) {
                                        $component->state("C");
                                        $set("point", 3);
                                    } else if ($state >= 40 && $state <= 49) {
                                        $component->state("D");
                                        $set("point", 2.4);
                                    } else if ($state < 40) {
                                        $component->state("F");
                                        $set("point", 0);
                                    }
                                }),
                            Forms\Components\TextInput::make('point')
                                ->reactive()
                                ->afterStateHydrated(function ($component, $state, callable $get, callable $set) {
                                    $student_total_points = $get("../../student_total_points");
                                    $student_total_points  += $state;
                                    $set("../../student_total_points", $student_total_points);
                                })
                                ->disabled(),

                            Forms\Components\TextInput::make('student_certified_hours')
                                ->reactive()
                                ->disabled()
                                ->afterStateHydrated(
                                    function ($state, callable $get, callable $set) {

                                        $student_hour_point = $get("../../student_hour_point");
                                        $point =$get("point");
                                        $student_hour_point+=$point*$state;

                                        
                                        
                                        $set("../../student_hour_point", $student_hour_point);
                                        
                                        $final= $student_hour_point/$get("../../total_hours");
                                        $set("../../final_average", $final);


                                        ////////////////////////////////////////////////////

                                        

                                    }
                                )

                        ])->minItems(function (callable $get) {
                            $semester = Semester::find($get("semester_id"));
                            if ($semester) {
                                return $semester->subjects->count();
                            } else {
                                return 0;
                            }
                        })
                        ->disableItemCreation()
                        ->disableItemDeletion()
                ]
            ),
        ];
    }

    protected function getFormModel(): Result
    {
        return $this->Result;
    }


    public function render()
    {
        return view('livewire.show-result');
    }
}
