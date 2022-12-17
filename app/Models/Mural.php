<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Murale
 *
 * @property $id
 * @property $user_id
 * @property $categoria_murales_id
 * @property $titulo_mural
 * @property $descripcion_mural
 * @property $image_mural
 * @property $info_externa
 * @property $nombre_url
 * @property $external_url
 * @property $direccion
 * @property $created_at
 * @property $updated_at
 *
 * @property ArtistMurale[] $artistMurales
 * @property CategoriesMural $categoriesMurale
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Mural extends Model
{
    protected $table = 'murales';
    static $rules = [

		'categoria_murales_id' => 'required',
		'titulo_mural' => 'required',
		// 'image_mural' => 'required',
		'direccion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','categoria_murales_id','titulo_mural','descripcion_mural','image_mural','info_externa','nombre_url','external_url','direccion'];


    // public function artists()
    // {
    //     return $this->belongsToMany(Artist::class);
    // }


    public function artists()
     {
         return $this->belongsToMany(Artist::class);
     }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoriesMurale()
    {
        return $this->hasOne('App\Models\CategoriesMural', 'id', 'categoria_murales_id');
    }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasOne
    //  */
    // public function user()
    // {
    //     return $this->hasOne('App\Models\User', 'id', 'user_id');
    // }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
