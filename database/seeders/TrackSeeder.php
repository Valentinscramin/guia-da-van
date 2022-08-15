<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('track')->insert(['name' => 'Escolares', 'active' => '1']);
        DB::table('track')->insert(['name' => 'Viagens e eventos', 'active' => '1']);
        DB::table('track')->insert(['name' => 'Executivos', 'active' => '1']);
        DB::table('track')->insert(['name' => 'Fretes', 'active' => '1']);
    }
}
