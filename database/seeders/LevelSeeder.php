<?php

namespace Database\Seeders;

use App\Models\UserLevel;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    private $model = UserLevel::class;
    private $data = array(
        ['Beginner'],
        ['Intermediate'],
        ['Advanced'],
        ['Expert']
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
