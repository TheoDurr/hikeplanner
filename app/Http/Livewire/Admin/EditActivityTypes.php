<?php

namespace App\Http\Livewire\Admin;

use App\Models\ActivityType;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditActivityTypes extends Component
{
    public $typeLabel;

    protected $messages = [
        'typeLabel' => 'This type already exists'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $level = new ActivityType();
        $level->label = $this->typeLabel;

        $level->save();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.edit-activity-types');
    }

    protected function rules()
    {
        return [
            'typeLabel' => [
                'string',
                Rule::unique('activity_type', 'label')
            ]
        ];
    }
}
