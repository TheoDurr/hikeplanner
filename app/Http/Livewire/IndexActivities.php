<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\Difficulty;
use App\Models\Path;
use App\Models\Weather;
use Database\Seeders\WeatherSeeder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IndexActivities extends Component
{

    protected $listeners = ['askedRemoval' => 'remove'];
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
        'id', 'type', 'path', 'difficulty', 'weather', 'temperature', 'description', 'date'
    ];
    public $sortedParamValues = array();
    public $searchString;

    public $filteredSport;
    public $filteredPath;
    public $filteredDifficulty;
    public $filteredWeather;


    public function mount() {
        foreach ($this->sortedParams as $param) {
            $this->sortedParamValues[$param] = $this->sortingValues[0];
        }
        $this->sortedParamValues['date'] = 'desc';
        $this->searchString = '';
        $this->resetFilter();
    }

    public function remove($id) {
        $activity = Activity::find($id);
        $activity->delete();
    }

    public function resetFilter() {
        $this->filteredSport = -1;
        $this->filteredPath = -1;
        $this->filteredDifficulty = -1;
        $this->filteredWeather = -1;
    }

    public function setNextSortingValue($sortedParam) {
        // find the next and set it
        $currentSorting = $this->sortedParamValues[$sortedParam];
        $i = array_search($currentSorting, $this->sortingValues) + 1;
        if ($i < 3) {
            $this->sortedParamValues[$sortedParam] = $this->sortingValues[$i];
        } else {
            $this->sortedParamValues[$sortedParam] = $this->sortingValues[0];
        }

        // reset every other sorting params
        foreach ($this->sortedParams as $param) {
            if ($param != $sortedParam) {
                $this->sortedParamValues[$param] = $this->sortingValues[0];
            }
        }
    }

    public function render()
    {
        return view('livewire.index-activities' , [
            'activities' => Auth::user()->activities()
                ->when($this->sortedParamValues['id'] != null, function ($query) {
                    return $query->orderBy('id', $this->sortedParamValues['id']);
                })
                ->when($this->sortedParamValues['type'] != null, function ($query) {
                    return $query
                        ->join('activity_type', 'activities.type_id', '=', 'activity_type.id')
                        ->orderBy('activity_type.label', $this->sortedParamValues['type']);
                })
                ->when($this->sortedParamValues['path'] != null, function ($query) {
                    return $query
                        ->join('paths', 'activities.path_id', '=', 'paths.id')
                        ->orderBy('paths.label', $this->sortedParamValues['path']);
                })
                ->when($this->sortedParamValues['difficulty'] != null, function ($query) {
                    return $query
                        ->join('difficulty', 'activities.difficulty_id', '=', 'difficulty.id')
                        ->orderBy('difficulty.label', $this->sortedParamValues['difficulty']);
                })
                ->when($this->sortedParamValues['weather'] != null, function ($query) {
                    return $query
                        ->join('weather', 'activities.weather_id', '=', 'weather.id')
                        ->orderBy('weather.label', $this->sortedParamValues['weather']);
                })
                ->when($this->sortedParamValues['temperature'] != null, function ($query) {
                    return $query->orderBy('temperature', $this->sortedParamValues['temperature']);
                })
                ->when($this->sortedParamValues['description'] != null, function ($query) {
                    return $query->orderBy('description', $this->sortedParamValues['description']);
                })
                ->when($this->sortedParamValues['date'] != null, function ($query) {
                    return $query->orderBy('activities.updated_at', $this->sortedParamValues['date']);
                })
                ->when($this->filteredSport != -1, function ($query) {
                    return $query->where('type_id', $this->filteredSport);
                })
                ->when($this->filteredPath != -1, function ($query) {
                    return $query->where('path_id', $this->filteredPath);
                })
                ->when($this->filteredDifficulty != -1, function ($query) {
                    return $query->where('difficulty_id', $this->filteredDifficulty);
                })
                ->when($this->filteredWeather != -1, function ($query) {
                    return $query->where('weather_id', $this->filteredWeather);
                })
                ->get(),
            'types' => ActivityType::all(),
            'paths' => Path::all(),
            'difficulties' => Difficulty::all(),
            'weathers' => Weather::all()
        ]);
    }
}
