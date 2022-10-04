<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $table = "announcement";


    public function announcement_photos()
    {
        return $this->belongsToMany('App\Models\Admin\AdminPhotos', 'announcement', 'id', 'admin_photo_id');
    }
}
