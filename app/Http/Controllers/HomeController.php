<?php

namespace App\Http\Controllers;
use App\Models\Artista;
use Illuminate\Http\Request;
use App\Models\Galeria;
use App\Models\Home;
use App\Models\Event;
use App\Models\Mural;
class HomeController extends Controller
{

    public function index()


    {
       $home['home'] = Home::first();
        $artistas['artistas'] = Artista::all();
        $murales = Mural::paginate(4);
        $events = Event::where('fecha_evento', '>=', now())->with(['artists'])->paginate(4);

         return view('home', compact('home', 'artistas','events', 'murales'));

    }

    public function show($id)
    {
        $artista = Artista::find($id);
        $artista_id=$id;
        $artistaObras['artistaObras']= Galeria::orderBy('artista_id')->where('artista_id',$artista_id)->get();
        return view('components.oneArtista', compact('artista', 'artistaObras'));
    }



}
