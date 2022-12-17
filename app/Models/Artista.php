<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    use HasFactory;
    static $rules = [
		'nombre' => 'required',
		'cover_carousel' => 'required',
		'descripcion' => 'required',
		'correo' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['user_id','nombre','cover_carousel','descripcion','correo','instagram','facebook','titulo','subtitulo'];

    public function images()
    {
        return $this->hasMany(ImageArtista::class);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


}
