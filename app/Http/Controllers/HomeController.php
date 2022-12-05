<?php

namespace App\Http\Controllers;
use App\Models\Artista;
use Illuminate\Http\Request;
use App\Models\Galeria;
use App\Models\Home;



class HomeController extends Controller
{

    public function index()
    {
        $home['home'] = Home::find(1);
        $artistas['artistas'] = Artista::all();
         return view('home', compact('home', 'artistas'));
    }

    public function show($id)
    {
        $artista = Artista::find($id);
        $artista_id=$id;
        $artistaObras['artistaObras']= Galeria::orderBy('artista_id')->where('artista_id',$artista_id)->get();
        return view('components.oneArtista', compact('artista', 'artistaObras'));
    }



}
