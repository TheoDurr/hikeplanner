<?php

namespace Database\Seeders;

use App\Models\Difficulty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DifficultySeeder extends Seeder
{
    private $model = Difficulty::class;
    private $data = array(
        ['Easy'],
        ['Medium'],
        ['Hard'],
    );
    private $schema = ['label'];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        seed($this->model, $this->data, $this->schema);
    }
}
