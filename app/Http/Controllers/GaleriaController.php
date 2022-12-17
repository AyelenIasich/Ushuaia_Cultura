<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use App\Models\Artista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Home_images;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class GaleriaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:galerias.create')->only('create', 'store');
        $this->middleware('can:galerias.edit')->only('edit', 'update');
        $this->middleware('can:galerias.destroy')->only('destroy');
    }


    public function create()
    {

        $galeria = new Galeria();
        $artista = Artista::pluck('nombre', 'id');
        $artistaUser = Artista::where('user_id', auth()->user()->id)->first();
        return view('galeria.create', compact('galeria', 'artista', 'artistaUser'));
    }


    public function store(Request $request)
    {
        request()->validate(Galeria::$rules);

        $campos = [
            'artista_id' => 'required',
            'image_obra' => 'required',

        ];
        $this->validate($request, $campos);


        if ($request->hasFile('image_obra')) {
            $file = $request->file('image_obra');
            $imageName =  Str::random(10) . $file->getClientOriginalName();
            $ruta = storage_path() . '\app\public\obras/' . $imageName;
            $ruta_storage = '/storage/obras/' . $imageName;
            Image::make($file)->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ruta);


            $galeria = new Galeria([
                'artista_id' => $request->artista_id,
                'image_obra' => $ruta_storage,
                'titulo_obra' => $request->titulo_obra,
                'descripcion_obra' => $request->descripcion_obra,
                'fecha_creacion' => $request->fecha_creacion,
            ]);
            $galeria->save();
        }
        $id = $galeria->id;

        return redirect()->route('galerias.edit', $id)->with('creado', 'ok');

    }


// FUNCION STORE ANTIGUA
    // public function store(Request $request)
    // {
    //     request()->validate(Galeria::$rules);

    //     $campos = [
    //         'artista_id' => 'required',
    //         'image_obra' => 'required',

    //     ];
    //     $this->validate($request, $campos);


    //     if ($request->hasFile('image_obra')) {
    //         $file = $request->file('image_obra');

    //         $imageName = time() . '_' . $file->getClientOriginalName();
    //         $file->move(\public_path("obras/"), $imageName);
    //         $galeria = new Galeria([
    //             'artista_id' => $request->artista_id,
    //             'image_obra' => $imageName,
    //             'titulo_obra' => $request->titulo_obra,
    //             'descripcion_obra' => $request->descripcion_obra,
    //             'fecha_creacion' => $request->fecha_creacion,
    //         ]);
    //         $galeria->save();
    //     }
    //     $id = $galeria->id;

    //     return redirect()->route('galerias.edit', $id)->with('creado', 'ok');

    // }


    public function edit($id)
    {
        $artistaUser = Artista::where('user_id', auth()->user()->id)->first();
        $galeria = Galeria::find($id);
        $artista = Artista::pluck('nombre', 'id');
        return view('galeria.edit', compact('galeria', 'artista', 'artistaUser'));
    }


    public function update(Request $request, $id)
    {
        $galeria = Galeria::findOrFail($id);
        $url = str_replace('storage', 'public', $galeria->image_obra);
        $ruta_storage = $galeria->image_obra;

        $campos = [
            'artista_id' => 'required|string|max:100',


        ];

        if ($request->hasFile("image_obra")) {
            $campos = ['image_obra' => 'required',];
        }
        $this->validate($request, $campos);


        if ($request->hasFile("image_obra")) {
            if (Storage::exists($url)) {
                Storage::delete($url);
            }
            $file = $request->file("image_obra");
            $imageName =  Str::random(10) . $file->getClientOriginalName();
            $ruta = storage_path() . '\app\public\obras/' . $imageName;
            $ruta_storage = '/storage/obras/' . $imageName;
            Image::make($file)->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ruta);
        }

        $galeria->update([
            'artista_id' => $request->artista_id,
            'image_obra' => $ruta_storage,
            'titulo_obra' => $request->titulo_obra,
            'descripcion_obra' => $request->descripcion_obra,
            'fecha_creacion' => $request->fecha_creacion,

        ]);

        return redirect()->route('galerias.edit', $id)->with('actualizado', 'ok');
    }



    public function destroy($id)
    {
        $galeria = Galeria::find($id);

        $url = str_replace('storage', 'public', $galeria->image_obra);
        Storage::delete($url);

        $galeria->delete();
        return back()->with('eliminar', 'eliminado');
    }
}
