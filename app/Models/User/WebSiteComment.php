<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WebSiteComment extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'web_site_comments';
    use HasFactory;

    public function userByid($user_id)
    {
        return DB::table('users')
            ->where('id', '=', $user_id)
            ->get()[0];
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
