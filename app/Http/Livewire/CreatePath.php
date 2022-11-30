<?php

namespace App\Http\Livewire;

use App\Models\Path;
use App\Models\Waypoint;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreatePath extends Component
{
    public Path $path;
    public $waypoints;

    protected $listeners = ['waypointsChanged' => 'setWaypoints'];

    public function setWaypoints($newWaypoints) {
        $this->waypoints = $newWaypoints;
    }

    protected $rules = [
        'path.label' => 'required|string|min:1',
    ];

    public function save() {
        $this->validate();
        $this->path->user_uuid = Auth::user()->uuid;

        $this->path->save();

        for ($i = 0; $i < sizeof($this->waypoints); $i++) {
            $waypoint = new Waypoint();
            $waypoint->path_id = $this->path->id;
            $waypoint->latitude = $this->waypoints[$i]['latitude'];
            $waypoint->longitude = $this->waypoints[$i]['longitude'];
            $waypoint->index = $i;
            $waypoint->save();
        }

        redirect()->route('paths');
    }

    public function mount() {
        $this->path = new Path();
        $this->waypoints = array();
    }

    public function render()
    {
        return view('livewire.create-path');
    }
}
