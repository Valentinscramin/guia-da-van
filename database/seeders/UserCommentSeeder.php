<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_comments')->insert(['comment_id' => '1', 'create_user_id' => '1', 'user_id' => '1']);
        DB::table('user_comments')->insert(['comment_id' => '2', 'create_user_id' => '1', 'user_id' => '1']);
        DB::table('user_comments')->insert(['comment_id' => '3', 'create_user_id' => '1', 'user_id' => '1']);
    }
}
