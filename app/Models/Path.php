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
}
