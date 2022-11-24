<?php

namespace App\Models;

use Database\Factories\DifficultyFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'difficulty';
    public $timestamps = false;

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    public function newFactory(): Factory
    {
        return DifficultyFactory::new();
    }

}
