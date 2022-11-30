<?php

namespace App\Http\Livewire\Admin;

use App\Models\UserLevel;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditUserLevels extends Component
{
    public $levelLabel;

    protected $messages = [
        'levelLabel' => 'This level already exists'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $level = new UserLevel();
        $level->label = $this->levelLabel;

        $level->save();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.edit-user-levels');
    }

    protected function rules()
    {
        return [
            'levelLabel' => [
                'string',
                Rule::unique('level', 'label')
            ]
        ];
    }
}
