<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Home_images;

class Home extends Model
{
    use HasFactory;

    static $rules = [
		'titulo' => 'required|alpha|max:350',
		'descripcion' => 'required|alpha|max:350',
    ];

    protected $fillable=[
        'titulo','descripcion',
    ];

    public function home_images(){
        return $this->hasMany(Home_images::class);
    }
}
