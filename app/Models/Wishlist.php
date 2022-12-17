<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Galeria;
class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'whislists';
    protected $fillables = [ 'user_id', 'obra_id', 'status'];

    public function obras_favoritas(){
        return $this->belongsTo(Galeria::class, 'obra_id', 'id');
    }
}
