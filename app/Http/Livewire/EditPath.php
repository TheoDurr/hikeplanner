<?php

namespace App\Http\Livewire;

use App\Models\Path;
use App\Models\Waypoint;
use Livewire\Component;

class EditPath extends Component
{
    public $pathId;
    public Path $path;
    public $waypoints;

    protected $listeners = ['waypointsChanged' => 'setWaypoints'];

    protected $rules = [
        'path.label' => 'required|string|min:1',
    ];

    public function setWaypoints($newWaypoints) {
        $this->waypoints = $newWaypoints;
    }

    public function mount() {
        $this->path = Path::find($this->pathId);
        $this->waypoints = array();
    }

    public function generateJsPath() {
        $result = "[";
        foreach ($this->path->waypoints()->orderBy('index', 'asc')->get()
                 as $waypoint) {
            $result .= "L.latLng(". $waypoint->latitude .",". $waypoint->longitude ."),";
        }
        return substr($result, 0, -1) . "]";
    }

    public function save() {
        $this->validate();

        if (sizeof($this->waypoints) > 0) {
            foreach ($this->path->waypoints as $waypoint) {
                $waypoint->delete();
            }
        }

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

    public function render()
    {
        return view('livewire.edit-path');
    }
}
