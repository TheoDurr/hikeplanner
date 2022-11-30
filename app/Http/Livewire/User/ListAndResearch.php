<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class ListAndResearch extends Component
{
    private $users;
    public $search = "";

    protected $rules = [
        'user' => 'nullable|alpha_num'
    ];

    private function search(string $criteria)
    {
        $criteria = '%' . $criteria . '%';
        if (empty($this->search)) {
            return User::all();
        } else {
            return User::where(function ($query) use ($criteria) {
                $query->where('firstname', 'like', $criteria)
                    ->orWhere('lastname', 'like', $criteria)
                    ->orWhere('email', 'like', $criteria)
                    ->orWhere('username', 'like', $criteria);
            })->get();
        }
    }

    public function render()
    {
        return view('livewire.user.list-and-research', [
            'users' => $this->search($this->search)
        ]);
    }
}
