<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliation extends Model
{
    protected $table = "avaliation";
    use HasFactory;

    public function user()
    {
        return $this->belongsToMany('App\Models\User', 'user_avaliations', 'user_id', 'avaliation_id');
    }
}
