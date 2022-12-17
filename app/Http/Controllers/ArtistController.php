<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;


class ArtistController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:artists.index')->only('index');
        $this->middleware('can:artists.create')->only('create', 'store');
        $this->middleware('can:artists.edit')->only('edit', 'update');
        $this->middleware('can:artists.destroy')->only('destroy');
    }

    public function index()
    {
        $artists = Artist::paginate(8);

        return view('artist.index', compact('artists'))
            ->with('i', (request()->input('page', 1) - 1) * $artists->perPage());
    }


    public function create()
    {
        $artist = new Artist();
        return view('artist.create', compact('artist'));
    }


    public function store(Request $request)
    {
        request()->validate(Artist::$rules);
        $artist = new Artist([
            'user_id' => auth()->user()->id,
            'nombre' => $request->nombre,
        ]);

        $artist->save();

        return redirect()->route('artists.index')
            ->with('success', 'Artist created successfully.');
    }



    public function storePerfil(Request $request)
    {
        request()->validate(Artist::$rules);

        $artist = new Artist([
            'user_id' => auth()->user()->id,
            'nombre' => $request->nombre,

        ]);

        $artist->save();

        return redirect('/artistas/create');
    }


    public function edit($id)
    {
        $artist = Artist::find($id);

        return view('artist.edit', compact('artist'));
    }


    public function update(Request $request, Artist $artist)
    {
        request()->validate(Artist::$rules);

        $artist = Artist::findOrFail($artist->id);


        $artist->update([
            'nombre' => $request->nombre,

        ]);
        // $artist = new Artist([
        //     'user_id' => auth()->user()->id,
        //     'nombre' => $request->nombre,

        // ]);


        // return redirect()->route('artists.index')->with('actualizado', 'ok');

        return back()
            ->with('actualizado', 'ok');
    }


    public function destroy($id)
    {
        $artist = Artist::find($id)->delete();

        return redirect()->route('artists.index')
            ->with('eliminar', 'eliminado');
    }
}
