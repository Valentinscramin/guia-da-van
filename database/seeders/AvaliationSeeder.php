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
        DB::table('avaliation')->insert(['avaliation' => '5']);
        DB::table('avaliation')->insert(['avaliation' => '3']);
        DB::table('avaliation')->insert(['avaliation' => '1']);
    }
}
