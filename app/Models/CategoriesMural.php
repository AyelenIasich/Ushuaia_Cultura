<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoriesMurale
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Murale[] $murales
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CategoriesMural extends Model
{
  protected $table = 'categories_murales';
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function murales()
    {
        return $this->hasMany('App\Models\Mural', 'categoria_murales_id', 'id');
    }


}
