<?php

namespace App\Models;

use App\Models\User\UserPhotos;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'cpf_cnpj',
        'data_nascimento',
        'celular',
        'telefone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function photo($id)
    {
        try {
            $user = User::find($id);
            return UserPhotos::find($user->user_photo_id);
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function avaliation()
    {
        return $this->hasMany('App\Models\User\Avaliation');
    }

    public function comment()
    {
        return $this->belongsToMany('App\Models\User\Comment', 'user_comments', 'user_id', 'comment_id');
    }

    public function webSiteComment()
    {
        return $this->hasMany('App\Models\User\WebSiteComment');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
}
