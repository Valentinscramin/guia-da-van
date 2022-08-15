<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Van extends Model
{
    protected $table = "van";
    use HasFactory;

    public function track()
    {
        return $this->belongsToMany('App\Models\Admin\Track', 'van_track', 'track_id', 'van_id');
    }
}
