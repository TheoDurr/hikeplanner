<?php

namespace Database\Seeders;

use App\Models\Weather;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    private $model = Weather::class;
    private $data = array(
        ['Sun'],
        ['Clouds'],
        ['Fog'],
        ['Rain']
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
