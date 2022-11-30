<?php

namespace App\Http\Livewire\Admin;

use App\Models\Difficulty;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditActivityDifficulties extends Component
{
    public $difficultyLabel;

    protected $messages = [
        'difficultyLabel' => 'This level already exists'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $level = new Difficulty();
        $level->label = $this->difficultyLabel;

        $level->save();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.edit-activity-difficulties');
    }

    protected function rules()
    {
        return [
            'difficultyLabel' => [
                'string',
                Rule::unique('difficulty', 'label')
            ]
        ];
    }
}
