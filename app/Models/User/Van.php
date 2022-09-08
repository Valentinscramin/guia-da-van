<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Van extends Model
{
    use HasFactory;
    protected $table = "van";

    public function track()
    {
        return $this->belongsToMany('App\Models\Admin\Track', 'van_track', 'van_id', 'track_id');
    }

    public function van_photos($id)
    {
        return DB::table('van_user_photo')->where("van_id", $id)->get();
    }
}
