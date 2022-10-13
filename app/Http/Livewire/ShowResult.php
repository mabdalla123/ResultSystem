<?php

namespace App\Http\Livewire;

use App\Models\Result;
use App\Models\Semester;
use Filament\Forms;
use Livewire\Component;

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

            Forms\Components\Select::make('semester_id')
                ->relationship('semester', 'name')
                ->reactive()
                ->disabled()
                ->columnSpan([
                    'md' => 1,
                ]),
            Forms\Components\Select::make('student_id')
                ->relationship('student', 'name')
                ->disabled()
                ->columnSpan([
                    'md' => 1,
                ]),

            Forms\Components\TextInput::make('average')
                ->name('Semester Average')
                ->disabled(),

            Forms\Components\Card::make()->schema(
                [
                    Forms\Components\Placeholder::make('Result details'),
                    Forms\Components\Repeater::make('details')
                        ->label('subjects')
                        ->relationship('details')
                        ->schema([
                            Forms\Components\Select::make('subject_id')
                                ->label('subjects')

                                ->disabled()
                                ->options(
                                    function (callable $get) {
                                        $semester = Semester::find($get('../../semester_id'));
                                        if ($semester) {
                                            return $semester->subjects
                                                ->pluck('name', 'id');
                                        } else {
                                            return [];
                                        }
                                    }
                                ),
                            Forms\Components\TextInput::make('mark')
                                ->disabled(),

                        ])->minItems(function (callable $get) {
                            $semester = Semester::find($get('semester_id'));
                            if ($semester) {
                                return $semester->subjects->count();
                            } else {
                                return 0;
                            }
                        })
                        ->disableItemCreation()
                        ->disableItemDeletion(),
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
