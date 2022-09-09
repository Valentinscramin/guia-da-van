<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvaliationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('avaliation')->insert(['avaliation' => '5', 'create_user_id' => '1', 'user_id' => '1']);
        DB::table('avaliation')->insert(['avaliation' => '3', 'create_user_id' => '1', 'user_id' => '1']);
        DB::table('avaliation')->insert(['avaliation' => '1', 'create_user_id' => '1', 'user_id' => '1']);
    }
}
