<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Image;
use App\Models\Galeria;


class ArtistaController extends Controller
{


    public function create()
    {
        $artista = new Artista();
        return view('artista.create', compact('artista'));
    }


    public function store(Request $request)
    {
        $campos=[ 'nombre'=> 'required|string|max:100',
        'apellido'=> 'required|string|max:100',
         'cover_carousel'=> 'required',
         'descripcion'=> 'required|string|max:500',
         'correo'=> 'required|string|email',
         'images'=> 'required',

        ];
        $this->validate($request, $campos);
        request()->validate(Artista::$rules);




        if ($request->hasFile('cover_carousel')) {
            $file = $request->file('cover_carousel');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("cover/"), $imageName);
            $Artista = new Artista([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'cover_carousel' => $imageName,
                'descripcion' => $request->descripcion,
                'correo' => $request->correo,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'titulo' => $request->titulo,
                'subtitulo' => $request->subtitulo,
            ]);
            $Artista->save();
        }

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $request['artista_id'] = $Artista->id;
                $request['image'] = $imageName;
                $file->move(\public_path("/images"), $imageName);
                Image::create($request->all());
            }
        }

        return redirect('/#artistas')->with('success', 'Nuevo artista creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artista = Artista::find($id);
        $artista_id=$id;
        $artistaObras['artistaObras']= Galeria::orderBy('artista_id')->where('artista_id',$artista_id)->get();
        // return view('artista.show', compact('artista'));
        return view('artista.show', compact('artista', 'artistaObras'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artista = Artista::find($id);

        return view('artista.edit', compact('artista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    // , Artista $artista
    {

        $artista = Artista::findOrFail($id);
        // request()->validate(Artista::$rules);

        if ($request->hasFile("cover_carousel")) {
            if (File::exists("cover/" . $artista->cover_carousel)) {
                File::delete("cover/" . $artista->cover_carousel);
            }
            $file = $request->file("cover_carousel");
            $artista->cover_carousel = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("/cover"), $artista->cover_carousel);
            $request['cover_carousel'] = $artista->cover_carousel;
        }

        $artista->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'cover_carousel' => $artista->cover_carousel,
            'descripcion' => $request->descripcion,
            'correo' => $request->correo,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'titulo' => $request->titulo,
            'subtitulo' => $request->subtitulo,
        ]);

        if ($request->hasFile("images")) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $request["artista_id"] = $id;
                $request["image"] = $imageName;
                $file->move(\public_path("images"), $imageName);
                Image::create($request->all());
            }
        }



        // $artista->update($request->all());
        return redirect('/#artistas')->with('success', 'Información de artista actualizado');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artista = Artista::find($id)->delete();

        return redirect('/#artistas')->with('success', 'Información del artista eliminado');
    }
    public function deletecover($id)
    {
        $cover_carousel = Artista::findOrFail($id)->cover_carousel;
        if (File::exists("cover/" . $cover_carousel)) {
            File::delete("cover/" . $cover_carousel);
        }
        return back();
    }

    public function deleteimage($id)
    {
        $images = Image::findOrFail($id);
        if (File::exists("images/" . $images->image)) {
            File::delete("images/" . $images->image);
        }
        Image::find($id)->delete();
        return back();
    }
}
