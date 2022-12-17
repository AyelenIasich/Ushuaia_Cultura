<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageArtista extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable = [
        'image', 'artista_id',
    ];

    public function artistas()
    {
        return $this->belongsTo(Artista::class);
    }
}
