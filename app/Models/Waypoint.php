<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waypoint extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'waypoints';
    public $timestamps = false;

    public function waypoint() {
        return $this->belongsTo(Path::class, 'path_id', 'id');
    }
}
