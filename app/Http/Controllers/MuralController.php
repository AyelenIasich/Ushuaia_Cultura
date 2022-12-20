<?php

namespace App\Http\Controllers;

use App\Models\Mural;
use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\CategoriesMural;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class MuralController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:murales.index')->only('index');
        $this->middleware('can:murales.create')->only('create', 'store');
        $this->middleware('can:murales.edit')->only('edit', 'update');
        $this->middleware('can:murales.destroy')->only('destroy');
    }

    public function allMurales()
    {
        $murales = Mural::paginate(6);
        $CategoriasMural = CategoriesMural::all();
        return view('components.allMurales', compact('murales', 'CategoriasMural'))->with('i', (request()->input('page', 1) - 1) * $murales->perPage());
    }

    public function CategoriaMural(CategoriesMural $categoria)
    {
        $murales = Mural::where('categoria_murales_id', $categoria->id)->latest('id')->paginate(6);
        $CategoriasMural = CategoriesMural::all();
        $CategoriaSelecta = CategoriesMural::where('id', $categoria->id)->get();
        return view('murale.categoria', compact('murales', 'CategoriasMural', 'CategoriaSelecta'));
    }

    public function index()
    {
        $murales = Mural::where('user_id', auth()->user()->id)->with(['artists'])->paginate(6);
        return view('murale.index', compact('murales'))->with('i', (request()->input('page', 1) - 1) * $murales->perPage());
    }


    public function create()
    {
        $murale = new Mural();
        $artists = Artist::pluck('nombre', 'id');
        $categories = CategoriesMural::pluck('nombre', 'id');
        return view('murale.create', compact('murale', 'categories', 'artists'));
    }

    public function store(Request $request)
    {
        request()->validate(Mural::$rules);

        //STORAGE NUBE SPACE DIGITAL OCEAN
        if ($request->hasFile('image_mural')) {
            $file = $request->file('image_mural');
            $imageName = Str::random(10) . $file->getClientOriginalName();
            $store = Storage::disk('do')->put('imagenMurales/' . $imageName,  file_get_contents($file->getRealPath()), 'public');
            $url = Storage::disk('do')->url('imagenMurales/' .  $imageName);
            $cdn_url = str_replace('digitaloceanspaces', 'cdn.digitaloceanspaces', $url);


            $murale = new Mural([
                'user_id' => auth()->user()->id,
                'categoria_murales_id' => $request->categoria_murales_id,
                'titulo_mural' => $request->titulo_mural,
                'descripcion_mural' => $request->descripcion_mural,
                'image_mural' => $cdn_url,
                'info_externa' => $request->info_externa,
                'nombre_url' => $request->nombre_url,
                'external_url' => $request->external_url,
                'direccion' => $request->direccion,

            ]);


            //STORE CON STORAGE LOCAL
            // if ($request->hasFile('image_mural')) {
            //     $nombre = Str::random(10) . $request->file('image_mural')->getClientOriginalName();
            //     $ruta = storage_path() . '\app\public\imagenMurales/' . $nombre;
            //     $ruta_storage = '/storage/imagenMurales/' . $nombre;
            //     Image::make($request->file('image_mural'))->resize(1200, null, function ($constraint) {
            //         $constraint->aspectRatio();
            //     })->save($ruta);

            //     $murale = new Mural([
            //         'user_id' => auth()->user()->id,
            //         'categoria_murales_id' => $request->categoria_murales_id,
            //         'titulo_mural' => $request->titulo_mural,
            //         'descripcion_mural' => $request->descripcion_mural,
            //         'image_mural' => $ruta_storage,
            //         'info_externa' => $request->info_externa,
            //         'nombre_url' => $request->nombre_url,
            //         'external_url' => $request->external_url,
            //         'direccion' => $request->direccion,

            //     ]);
            $murale->save();
            $murale->artists()->sync($request->input('artists', []));
        }
        return redirect()->route('murales.edit', $murale->id)->with('creado', 'ok');
    }




    public function edit($id)
    {
        $murale = Mural::find($id);
        $artists = Artist::pluck('nombre', 'id');
        $categories = CategoriesMural::pluck('nombre', 'id');
        return view('murale.edit', compact('murale', 'categories', 'artists'));
    }

    public function update(Request $request, Mural $murale)
    {
        request()->validate(Mural::$rules);

        // STORE NUBE SPACES DIGITAL OCEAN

        $cdn_url = $murale->image_mural;

        if ($request->hasFile("image_mural")) {

            $url = str_replace('https://ushuaiacultura.nyc3.cdn.digitaloceanspaces.com/imagenMurales', 'imagenMurales', $murale->image_mural);
            Storage::disk('do')->delete($url);

            $file = $request->file('image_mural');
            $imageName = Str::random(10) . $file->getClientOriginalName();
            $store = Storage::disk('do')->put('imagenMurales/' . $imageName,  file_get_contents($file->getRealPath()), 'public');
            $url = Storage::disk('do')->url('imagenMurales/' .  $imageName);
            $cdn_url = str_replace('digitaloceanspaces', 'cdn.digitaloceanspaces', $url);
        }


        $murale->update([
            'user_id' => auth()->user()->id,
            'categoria_murales_id' => $request->categoria_murales_id,
            'titulo_mural' => $request->titulo_mural,
            'descripcion_mural' => $request->descripcion_mural,
            'image_mural' => $cdn_url,
            'info_externa' => $request->info_externa,
            'nombre_url' => $request->nombre_url,
            'external_url' => $request->external_url,
            'direccion' => $request->direccion,

        ]);




        //   UPDATE CON STORAGE LOCAL
        // $ruta_storage = $murale->image_mural;

        // if ($request->hasFile("image_mural")) {

        //     $url = str_replace('storage', 'public', $murale->image_mural);
        //     Storage::delete($url);

        //     $nombre = Str::random(10) . $request->file('image_mural')->getClientOriginalName();
        //     $ruta = storage_path() . '\app\public\imagenMurales/' . $nombre;
        //     $ruta_storage = '/storage/imagenMurales/' . $nombre;
        //     Image::make($request->file('image_mural'))->resize(1200, null, function ($constraint) {
        //         $constraint->aspectRatio();
        //     })->save($ruta);
        // }


        // $murale->update([
        //     'user_id' => auth()->user()->id,
        //     'categoria_murales_id' => $request->categoria_murales_id,
        //     'titulo_mural' => $request->titulo_mural,
        //     'descripcion_mural' => $request->descripcion_mural,
        //     'image_mural' => $ruta_storage,
        //     'info_externa' => $request->info_externa,
        //     'nombre_url' => $request->nombre_url,
        //     'external_url' => $request->external_url,
        //     'direccion' => $request->direccion,

        // ]);
        if ($request->artists) {

            $murale->artists()->sync($request->input('artists', []));
        }
        return back()->with('actualizado', 'ok');
    }


    public function destroy($id)
    {
        //DESTROY NUBE SPACES DIGITAL OCEAN

        $murale = Mural::findOrFail($id);

        $url = str_replace('https://ushuaiacultura.nyc3.cdn.digitaloceanspaces.com/imagenMurales', 'imagenMurales', $murale->image_mural);

        Storage::disk('do')->delete($url);


        // DESTROY STORAGE LOCAL
        // $murale = Mural::findOrFail($id);
        // $url = str_replace('storage', 'public', $murale->image_evento);
        // Storage::delete($url);
        $murale->delete();
        return redirect()->route('murales.index')->with('success', 'Murale deleted successfully');
    }
}
