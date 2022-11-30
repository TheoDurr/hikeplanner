<?php

namespace App\Http\Livewire;

use App\Models\User;
use Date;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditUser extends Component
{
    public User $user;

    protected $messages = [
        'user.birthdate.before' => 'You cannot be born in the future',
        'user.username.unique' => 'Username already taken',
        'user.email.unique' => 'Email address already taken'
    ];

    protected function rules()
    {
        return [
            'user.firstname' => [
                'nullable',
                'string'
            ],
            'user.lastname' => [
                'nullable',
                'string'
            ],
            'user.birthdate' => [
                'nullable',
                'before:' . Date::today()
            ],
            'user.username' => [
                'required',
                'string',
                Rule::unique('users', 'username')->ignore($this->user->uuid, 'uuid')
            ],
            'user.email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user->uuid, 'uuid')
            ]
        ];
    }

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        // Casting to lowercase because mutators does not work
        $this->user->firstname = strtolower($this->user->firstname);
        $this->user->lastname = strtolower($this->user->lastname);

        $this->user->save();
        session()->flash('message-success', __("Your information has been updated successfully."));
    }

    public function render()
    {
        return view('livewire.edit-user');
    }
}
