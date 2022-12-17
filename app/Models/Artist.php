<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Artist extends Model
{
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['user_id','nombre'];

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function murales()
    {
        return $this->belongsToMany(Mural::class);
    }
}
