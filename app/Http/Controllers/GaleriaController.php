<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use App\Models\Artista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Home_images;

class GaleriaController extends Controller
{

    // public function index()
    // {
    //     $galerias = Galeria::orderBy('artista_id', 'asc')->paginate();

    //     return view('galeria.index', compact('galerias'))
    //         ->with('i', (request()->input('page', 1) - 1) * $galerias->perPage());
    // }


    public function create()
    {


        $galeria = new Galeria();
        $artista = Artista::pluck('apellido', 'id');
        return view('galeria.create', compact('galeria', 'artista'));
    }


    public function store(Request $request)
    {
        request()->validate(Galeria::$rules);

        $campos = [
            'artista_id' => 'required',
            'image_obra' => 'required',
            'titulo_obra' => 'required|string|max:500',


        ];
        $this->validate($request, $campos);


        if ($request->hasFile('image_obra')) {
            $file = $request->file('image_obra');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("obras/"), $imageName);
            $galeria = new Galeria([
                'artista_id' => $request->artista_id,
                'image_obra' => $imageName,
                'titulo_obra' => $request->titulo_obra,
                'descripcion_obra' => $request->descripcion_obra,
                'fecha_creacion' => $request->fecha_creacion,
            ]);
            $galeria->save();
        }



        return redirect('/artistas/' .  $request->artista_id . '/#galeria')->with('success', 'Nuevo artista creado.');
    }


    public function edit($id)
    {
        $galeria = Galeria::find($id);
        $artista = Artista::pluck('apellido', 'id');
        return view('galeria.edit', compact('galeria', 'artista'));
    }

    public function update(Request $request, $id)
    {
        $galeria = Galeria::findOrFail($id);

        $campos = [
            'artista_id' => 'required|string|max:100',
            'titulo_obra' => 'required|string|max:500',

        ];

        if ($request->hasFile("image_obra")) {
            $campos = ['image_obra' => 'required',];
        }
        $this->validate($request, $campos);




        if ($request->hasFile("image_obra")) {
            if (File::exists("obras/" . $galeria->image_obra)) {
                File::delete("obras/" . $galeria->image_obra);
            }
            $file = $request->file("image_obra");
            $galeria->image_obra = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("/obras"), $galeria->image_obra);
            $request['image_obra'] = $galeria->image_obra;
        }

        $galeria->update([
            'artista_id' => $request->artista_id,
            'image_obra' => $galeria->image_obra,
            'titulo_obra' => $request->titulo_obra,
            'descripcion_obra' => $request->descripcion_obra,
            'fecha_creacion' => $request->fecha_creacion,

        ]);

        return redirect('/artistas/' .  $request->artista_id . '/#galeria')->with('success', 'Foto de galería actualizada');
    }


    public function destroy($id)
    {
        $galeria = Galeria::find($id)->delete();

        return redirect()->route('galerias.index')
            ->with('success', 'Imagen borrada');
    }
}
