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
}
