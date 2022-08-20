<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comment')->insert(['comment' => 'teste 1']);
        DB::table('comment')->insert(['comment' => 'teste 2']);
        DB::table('comment')->insert(['comment' => 'teste 3']);
    }
}
