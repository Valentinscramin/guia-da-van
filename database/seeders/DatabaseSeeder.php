<?php

namespace Database\Seeders;

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
        $this->call(AdminSeeder::class);
        //$this->call(UserSeeder::class);
        $this->call(TrackSeeder::class);
        //$this->call(VanSeeder::class);
        // $this->call(VanTrackSeeder::class);
        // $this->call(CommentSeeder::class);
        // $this->call(AvaliationSeeder::class);
        // $this->call(UserCommentSeeder::class);
        $this->call(StatesSeeder::class);
        $this->call(CitiesSeeder::class);
    }
}
