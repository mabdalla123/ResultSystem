<?php

namespace App\Http\Livewire;

use Filament\Tables;
use App\Models\Result;
use Livewire\Component;
use App\Models\Department;
use App\Models\AcadimicYear;
use Filament\Forms\Components\Select;

use Filament\Forms\Components\Builder;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

class SearchTable extends Component  implements Tables\Contracts\HasTable, HasForms

{

    public $department;
    public $acadimicyear;
    public $semester;
    public $student;

    use Tables\Concerns\InteractsWithTable;
    use InteractsWithForms;
    public function render()
    {
        return view('livewire.search-table');
    }

    protected function getFormSchema(): array
    {
        return [

            Select::make("department")->options(function () {
                return Department::all()->pluck("name", "id");
            })
                ->reactive()
                ->label("Department"),
            Select::make("acadimicyear")
                ->label("AcadimicYear")
                ->reactive()
                ->options(
                    function (callable $get) {

                        $department = Department::find($get("department"));

                        if ($department) {
                            return $department->acadimicyear->pluck("name", "id") ?? [];
                        } else {
                            return [];
                        }
                    }
                ),
            Select::make("semester")
                ->label("Semester")
                ->reactive()
                ->options(
                    function (callable $get) {

                        $acadimicyear = AcadimicYear::find($get("acadimicyear"));

                        if ($acadimicyear && $acadimicyear->semester) {
                            return $acadimicyear->semester->pluck("name", "id") ?? [];
                        } else {
                            return [];
                        }
                    }
                ),

            Select::make("student")
                ->label("student")
                ->reactive()
                ->options(
                    function (callable $get) {

                        $department = Department::find($get("department"));

                        if ($department) {
                            return $department->students->pluck("name", "id") ?? [];
                        } else {
                            return [];
                        }
                    }
                ),





        ];
    }

    protected function getTableQuery()
    {
        return Result::where("semester_id", $this->semester)
            ->where("student_id", $this->student);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('student.name'),
            Tables\Columns\TextColumn::make('semester.name'),
            Tables\Columns\TextColumn::make('semester.acadimicyear.name'),
            Tables\Columns\TextColumn::make('semester.acadimicyear.department.name'),
            Tables\Columns\TextColumn::make('average'),

        ];
    }


    protected function getTableRecordUrlUsing()
    {
        return fn (Result $record): string => route('showresult', ['Result' => $record]);
    }
}
