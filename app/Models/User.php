<?php

namespace App\Models;

use App\Models\User\UserPhotos;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Node\Stmt\TryCatch;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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
        return $this->belongsToMany('App\Models\User\Avaliation', 'user_avaliations', 'user_id', 'avaliation_id');
    }

    public function comment()
    {
        return $this->belongsToMany('App\Models\User\Comment', 'user_comments', 'user_id', 'comment_id');
    }
}
