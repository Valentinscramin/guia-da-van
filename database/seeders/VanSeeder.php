<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('van')->insert(['model' => 'Mercedes Benz', 'plate' => 'tex19t0', 'seats' => '6', 'user_id' => '1']);
        DB::table('van')->insert(['model' => 'Volvo', 'plate' => 'tex19t0', 'seats' => '8', 'user_id' => '1']);
        DB::table('van')->insert(['model' => 'Volkswagen', 'plate' => 'tex19t0', 'seats' => '4', 'user_id' => '1']);
        DB::table('van')->insert(['model' => 'Fiat', 'plate' => 'tex19t0', 'seats' => '5', 'user_id' => '1']);
    }
}
