<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Path extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'paths';

    public function waypoints() {
        return $this->hasMany(Waypoint::class, 'path_id', 'id');
    }

    public function activities() {
        return $this->hasMany(Activity::class, 'path_id', 'id');
    }

    public function scopeSearch($query, $search_string) {
        $search_string = "%".$search_string."%";
        return $query->where('label', 'like', $search_string);
    }
}
