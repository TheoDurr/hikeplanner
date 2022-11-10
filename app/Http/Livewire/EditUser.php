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
                'alpha'
            ],
            'user.lastname' => [
                'alpha'
            ],
            'user.birthdate' => [
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
        $validatedData = $this->validate();

        $this->user->update($validatedData);
        session()->flash('message', 'Your informations has been updated successfully.');
    }

    public function render()
    {
        return view('livewire.edit-user');
    }
}
