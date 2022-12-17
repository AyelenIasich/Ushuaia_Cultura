<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{

    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['nombre'];


    public function events()
    {
        return $this->hasMany('App\Models\Event', 'categoria_id', 'id');
    }


}
