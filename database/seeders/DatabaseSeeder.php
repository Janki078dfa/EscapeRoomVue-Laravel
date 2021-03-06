<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Review;
use App\Models\Room;
use App\Models\User;
use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();
        Game::factory(3)->create();
        Room::factory(3)->create();
        Booking::factory(3)->create();
        Review::factory(3)->create();
        $this->call(RoleTableSeeder::class);
    }
}
