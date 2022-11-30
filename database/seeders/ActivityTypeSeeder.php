<?php

namespace Database\Seeders;

use App\Models\ActivityType;
use Illuminate\Database\Seeder;

class ActivityTypeSeeder extends Seeder
{
    private $model = ActivityType::class;
    private $data = array(
        ['Running'],
        ['Walking'],
        ['Biking'],
        ['Cycling'],
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
