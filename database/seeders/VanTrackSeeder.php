<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VanTrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('van_track')->insert(['track_id' => '1', 'van_id' => '1']);
        DB::table('van_track')->insert(['track_id' => '2', 'van_id' => '2']);
        DB::table('van_track')->insert(['track_id' => '3', 'van_id' => '3']);
        DB::table('van_track')->insert(['track_id' => '4', 'van_id' => '4']);
        DB::table('van_track')->insert(['track_id' => '4', 'van_id' => '2']);
    }
}
