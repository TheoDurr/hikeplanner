<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'weather';
    public $timestamps = false;
}
