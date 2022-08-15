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
        return $this->hasMany('App\Models\Admin\Track');
    }
}
