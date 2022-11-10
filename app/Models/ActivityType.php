<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityType extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'activity_type';
    public $timestamps = false;
}
