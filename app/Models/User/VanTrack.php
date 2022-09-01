<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VanTrack extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'van_track';

    public function van_track_info()
    {
        $this->belongsTo('App\Models\User\VanTrackInfo');
    }
}
