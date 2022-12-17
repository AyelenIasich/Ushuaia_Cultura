<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mural;


class WishlistMural extends Model
{
    use HasFactory;
    protected $table = 'wishlists_mural';
    protected $fillables = [ 'user_id', 'mural_id', 'status'];

    public function murales_favoritos(){
        return $this->belongsTo(Mural::class, 'mural_id', 'id');
    }
}
