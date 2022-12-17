<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Event extends Model
{

    static $rules = [
        'categoria_id' => 'required',
        'titulo_evento' => 'required',
        'hora_evento' => 'required',
        'fecha_evento' => 'required',
        'resumen' => 'required',
        'image_evento' => 'required',
        'direccion' => 'required',
    ];

    protected $perPage = 20;
    protected $dates = ['fecha_evento'];
    protected $casts = ['hora_evento' => 'datetime:H:i',];

    protected $fillable = ['user_id','categoria_id', 'titulo_evento', 'hora_evento', 'fecha_evento', 'resumen', 'descripcion_evento', 'image_evento', 'info_external', 'nombre_url', 'external_url', 'direccion', 'institucion'];

    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }

    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'categoria_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
