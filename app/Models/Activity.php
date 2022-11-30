<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'activities';

    public function type() {
        return $this->hasOne(ActivityType::class, 'id', 'type_id');
    }

    public function path() {
        return $this->hasOne(Path::class, 'id', 'path_id');
    }

    public function difficulty() {
        return $this->hasOne(Difficulty::class, 'id', 'difficulty_id');
    }

    public function weather() {
        return $this->hasOne(Weather::class, 'id', 'weather_id');
    }

    public function scopeSearch($query, $searchString) {
        $search_string = "%".$searchString."%";
        return $query
            ->join('activity_type', 'activities.type_id', '=', 'activity_type.id')
            ->join('paths', 'activities.path_id', '=', 'paths.id')
            ->join('difficulty', 'activities.difficulty_id', '=', 'difficulty.id')
            ->join('weather', 'activities.weather_id', '=', 'weather.id')
            ->orWhere('activity_type.label', 'like', $searchString)
            ->orWhere('paths.label', 'like', $searchString)
            ->orWhere('difficulty.label', 'like', $searchString)
            ->orWhere('weather.label', 'like', $searchString);
    }
}
