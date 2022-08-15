<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{

    protected $table = "track";
    use HasFactory;

    public function van()
    {
        return $this->belongsToMany('App\Models\User\Van', 'van_track', 'van_id', 'track_id');
    }
}
