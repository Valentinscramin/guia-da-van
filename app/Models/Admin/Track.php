<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{

    use HasFactory;
    protected $table = "track";

    public function van()
    {
        return $this->belongsToMany('App\Models\User\Van', 'van_track', 'track_id', 'van_id');
    }
}
