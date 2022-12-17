<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; use HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function artista()
    {
        return $this->hasOne('App\Models\Artista');
    }
    public function artist()
    {
        return $this->hasMany('App\Models\Artist');
    }
    public function murales()
    {
        return $this->hasMany('App\Models\Murale');
    }
    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }
}
