<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\WishlistEvent;
use App\Models\WishlistMural;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function storewishlist(Request $request)
    {
        $obra_id = $request->obra_id;
        if (Wishlist::where('user_id', Auth::id())->where('obra_id', $obra_id)->exists()) {
            //si ya fue agregado
            return response()->json(['status' => 'La obra ya existe en favoritos']);
        } else {
            $wishlist = new Wishlist();
            $wishlist->user_id = Auth::id();
            $wishlist->obra_id = $obra_id;
            $wishlist->save();
            return response()->json(['status' => 'La obra fue agregada a favoritos']);
        }
    }

    public function index()
    {
        $wishlist =Wishlist::where('user_id', Auth::id())->get();
        return view('wishlist.index', compact('wishlist'));

    }
    public function removewishlistitem(Request $request){
        $wishlist_id = $request->wishlist_id;
        if(Wishlist::where('user_id', Auth::id())->where('id',$wishlist_id)->exists()){
            $wishlist = Wishlist::where('user_id', Auth::id())->where('id',$wishlist_id)->first();
            $wishlist->delete();
            return response()->json(['status' => 'Obra eliminada de favoritos']);
        }
        else{
           return response()->json(['status' => 'No se encontro el item']);
        }
    }


// Eventos

    public function storewishlistevent(Request $request)
    {
        $event_id = $request->event_id;
        if (WishlistEvent::where('user_id', Auth::id())->where('event_id', $event_id)->exists()) {
            //si ya fue agregado
            return response()->json(['status' => 'El evento ya existe en favoritos']);
        } else {
            $wishlistEvent = new WishlistEvent();
            $wishlistEvent->user_id = Auth::id();
            $wishlistEvent->event_id = $event_id;
            $wishlistEvent->save();
            return response()->json(['status' => 'El evento fue agregada a favoritos']);
        }
    }

    public function indexevent()
    {
        $wishlistEvent =WishlistEvent::where('user_id', Auth::id())->get();
        return view('wishlist.indexWishEvent', compact('wishlistEvent'));

    }

    public function removewishlistitemevent(Request $request){
        $wishlistevent_id = $request->wishlistevent_id;
        if(WishlistEvent::where('user_id', Auth::id())->where('id',$wishlistevent_id)->exists()){
            $wishlistevent_id = WishlistEvent::where('user_id', Auth::id())->where('id',$wishlistevent_id)->first();
            $wishlistevent_id->delete();
            return response()->json(['status' => 'Obra eliminada de favoritos']);
        }
        else{
           return response()->json(['status' => 'No se encontro el item']);
        }
    }

    // MURALES
    public function storewishlistmural(Request $request)
    {
        $mural_id = $request->mural_id;
        if (WishlistMural::where('user_id', Auth::id())->where('mural_id', $mural_id)->exists()) {
            //si ya fue agregado
            return response()->json(['status' => 'El mural ya existe en favoritos']);
        } else {
            $wishlistMural = new WishlistMural();
            $wishlistMural->user_id = Auth::id();
            $wishlistMural->mural_id = $mural_id;
            $wishlistMural->save();
            return response()->json(['status' => 'El mural fue agregada a favoritos']);
        }
    }

    public function indexMural()
    {
        $wishlistMural =WishlistMural::where('user_id', Auth::id())->paginate(6);
        return view('wishlist.indexWishMural', compact('wishlistMural'))->with('i', (request()->input('page', 1) - 1) * $wishlistMural->perPage());

    }

    public function removewishlistmural(Request $request){
        $wishlistmural_id = $request->wishlistmural_id;
        if(WishlistMural::where('user_id', Auth::id())->where('id',$wishlistmural_id)->exists()){
            $wishlistmural_id = WishlistMural::where('user_id', Auth::id())->where('id',$wishlistmural_id)->first();
            $wishlistmural_id->delete();
            return response()->json(['status' => 'Mural eliminada de favoritos']);
        }
        else{
           return response()->json(['status' => 'No se encontro el item']);
        }
    }

}
