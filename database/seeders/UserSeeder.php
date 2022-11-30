<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(50)
            ->state(new Sequence(
                fn ($seq) => ['level_id' => UserLevel::all()->random(),]
            ))
            ->create();

        User::factory()
            ->count(10)
            ->admin()
            ->create();
    }
}
