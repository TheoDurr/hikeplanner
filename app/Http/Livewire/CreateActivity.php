<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\Difficulty;
use App\Models\Path;
use App\Models\User;
use App\Models\Weather;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateActivity extends Component
{
    public Activity $activity;
    public $date;
    public $time;

    protected $rules = [
        'activity.type_id' => 'required',
        'activity.path_id' => 'required',
        'activity.difficulty_id' => 'required',
        'activity.weather_id' => 'required',
        'activity.temperature' => 'required',
        'activity.description' => 'string',
        'date' => 'date'
    ];

    protected $messages = [
        'activity.type_id.required' => 'You must select a sport',
        'activity.path_id.required' => 'You must select a path',
        'activity.difficulty_id.required' => 'You must select a level of difficulty',
        'activity.weather_id.required' => 'You must select a weather',
        'activity.temperature.required' => 'You must indicate the temperature'
    ];

    public function mount() {
        $this->activity = new Activity();
        $this->activity->temperature = 20;
        $this->activity->description = "";

    }

    public function save() {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.create-activity', [
            'paths' => Auth::user()->paths,
            'types' => ActivityType::all(),
            'difficulties' => Difficulty::all(),
            'weathers' => Weather::all()
            ]);
    }
}
