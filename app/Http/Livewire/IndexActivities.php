<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IndexActivities extends Component
{
    private $sortingValues = [
        null,
        'asc',
        'desc'
    ];
    public $sortingChars = [
        null => '',
        'asc' => '<svg xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="m14 28 10-10.05L34 28Z"/></svg>',
        'desc' => '<svg xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="m24 30-10-9.95h20Z"/></svg>'
    ];
    public $sortedParams = [
        'id', 'type', 'path', 'difficulty', 'weather', 'description', 'date'
    ];
    public $sortedParamValues = array();


    public function mount() {
        foreach ($this->sortedParams as $param) {
            $this->sortedParamValues[$param] = $this->sortingValues[0];
        }
    }

    private function getNextSortingValue(&$sorted) {
        $index = array_search($sorted, $this->sortingValues);
        if ($index == sizeof($this->sortingValues)-1) {
            $sorted = $this->sortingValues[0];
        } else {
            $sorted = $this->sortingValues[$index+1];
        }
    }




    public function render()
    {
        return view('livewire.index-activities' , [
            'activities' => Auth::user()->activities()->get()
        ]);
    }
}
