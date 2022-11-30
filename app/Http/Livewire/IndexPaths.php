<?php

namespace App\Http\Livewire;

use App\Models\Path;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IndexPaths extends Component
{
    protected $listeners = ['askedPathRemoval' => 'remove'];

    public $search;
    public $idSort;
    public $nameSort;
    public $dateSort;
    public $orderBy;
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

    public function mount() {
        $this->idSort = null;
        $this->nameSort = null;
        $this->dateSort = 'desc';
        $this->orderBy = 'updated_at';
    }

    public function canIRemove($id) {
        $path = Path::find($id);
        if ($path == null) return false;
        if ($path->activities()->count() > 0) return false;
        return true;
    }

    public function remove($id) {
        $path = Path::find($id);
        $path->delete();
    }

    public function clickSortId() {
        $this->nameSort = null;
        $this->dateSort = null;
        $this->getNextSortingValue($this->idSort);
        $this->orderBy = 'id';
    }

    public function clickSortName() {
        $this->dateSort = null;
        $this->idSort = null;
        $this->getNextSortingValue($this->nameSort);
        $this->orderBy = 'label';
    }

    public function clickSortDate() {
        $this->idSort = null;
        $this->nameSort = null;
        $this->getNextSortingValue($this->dateSort);
        $this->orderBy = 'updated_at';
    }

    public function edit($id) {
        redirect()->route('paths.edit', ['pathId' => $id]);
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
        return view('livewire.index-paths', [
            "paths" => Auth::user()->paths()
                ->when($this->dateSort != null, function ($query) {
                    $query->orderBy($this->orderBy, $this->dateSort);
                })
                ->when($this->idSort != null, function ($query) {
                    $query->orderBy($this->orderBy, $this->idSort);
                })
                ->when($this->nameSort != null, function ($query) {
                    $query->orderBy($this->orderBy, $this->nameSort);
                })
                ->when(isset($this->search), function ($query) {
                    $query->search($this->search);
                })
                ->get()
        ]);
    }
}
