<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_images extends Model
{
    use HasFactory;
    protected $fillable = [ 'image', 'home_id',];

    static $rules = [
		'images' => 'required',
    ];

    public function homes(){
        return $this->belongsTo(Home::class);
    }
}
