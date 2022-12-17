<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    use HasFactory;
    static $rules = [
		'artista_id' => 'required',
		'image_obra' => 'required',

    ];
    protected $dates = ['fecha_creacion'];
    protected $fillable = ['artista_id','image_obra','titulo_obra','descripcion_obra','fecha_creacion'];

    public function artista()
    {
        return $this->hasOne('App\Models\Artista', 'id', 'artista_id');
    }
}
