<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;


class WishlistEvent extends Model
{
    use HasFactory;
    protected $table = 'wishlists_event';
    protected $fillables = [ 'user_id', 'obra_id', 'status'];

    public function eventos_favoritas(){
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
}
