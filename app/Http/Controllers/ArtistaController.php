<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Artista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\ImageArtista;
use App\Models\Galeria;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class ArtistaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:artistas.index')->only('index');
        $this->middleware('can:artistas.create')->only('create', 'store');
        $this->middleware('can:artistas.edit')->only('edit', 'update');
        $this->middleware('can:artistas.destroy')->only('destroy');
    }

    public function index()
    {
        $artista = Artista::where('user_id', auth()->user()->id)->first();
        // $artista_id= $artista->id;

        if (isset($artista->id)) {
            $artistaObras['artistaObras'] = Galeria::orderBy('artista_id')->where('artista_id', $artista->id)->get();
        }

        if (isset($artista->id)) {
            return view('perfil-artista.miperfil', compact('artista', 'artistaObras'));
        }



        // return view('perfil-artista.miperfil', compact('artista', 'artistaObras'));
        return view('perfil-artista.miperfil', compact('artista'));
    }

    public function create()
    {
        // $artistaUser = Artist::where('user_id', auth()->user()->id)->first();
        $artista = new Artista();
        // return view('artista.create', compact('artista', 'artistaUser'));
        return view('artista.create', compact('artista'));
    }


    public function store(Request $request)
    {
        $campos = [
            'nombre' => 'required|string|max:100',
            'cover_carousel' => 'required',
            'descripcion' => 'required|string|max:500',
            'correo' => 'required|string|email',
            'images' => 'required',

        ];
        $this->validate($request, $campos);



        //STORE EN NUBE CON SPACES DIGITAL OCEAN

        if ($request->hasFile('cover_carousel')) {
            $file = $request->file('cover_carousel');
            $imageName =  Str::random(10) . $file->getClientOriginalName();
            $store = Storage::disk('do')->put('cover/' . $imageName,  file_get_contents($file->getRealPath()), 'public');
            $url = Storage::disk('do')->url('cover/' .  $imageName);
            $cdn_url = str_replace('digitaloceanspaces', 'cdn.digitaloceanspaces', $url);

            $artista = new Artista([
                'user_id' => auth()->user()->id,
                'nombre' => $request->nombre,
                'cover_carousel' =>  $cdn_url,
                'descripcion' => $request->descripcion,
                'correo' => $request->correo,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'titulo' => $request->titulo,
                'subtitulo' => $request->subtitulo,

            ]);
            $artista->save();
            $listaArtista = new Artist([
                'user_id' => auth()->user()->id,
                'nombre' => $request->nombre,
            ]);
            $listaArtista->save();
        }
        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName =  Str::random(10) . $file->getClientOriginalName();
                $store = Storage::disk('do')->put('images/' . $imageName,  file_get_contents($file->getRealPath()), 'public');
                $url = Storage::disk('do')->url('images/' .  $imageName);
                $cdn_url = str_replace('digitaloceanspaces', 'cdn.digitaloceanspaces', $url);


                $images = new ImageArtista([
                    'artista_id' =>  $artista->id,
                    'image' =>  $cdn_url,

                ]);
                $images->save();
            }
        }



        //STORE CON STORAGE LOCAL FUNCIONA PERFECTO





        // if ($request->hasFile('cover_carousel')) {
        //     $file = $request->file('cover_carousel');
        //     $imageName =  Str::random(10) . $file->getClientOriginalName();
        //     $ruta = storage_path() . '\app\public\cover/' . $imageName;
        //     $ruta_storage = '/storage/cover/' . $imageName;
        //     Image::make($file)->resize(1200, null, function ($constraint) {
        //         $constraint->aspectRatio();
        //     })->save($ruta);


        //     $artista = new Artista([
        //         'user_id' => auth()->user()->id,
        //         'nombre' => $request->nombre,
        //         'cover_carousel' => $ruta_storage,
        //         'descripcion' => $request->descripcion,
        //         'correo' => $request->correo,
        //         'instagram' => $request->instagram,
        //         'facebook' => $request->facebook,
        //         'titulo' => $request->titulo,
        //         'subtitulo' => $request->subtitulo,

        //     ]);
        //     $artista->save();
        //     $listaArtista = new Artist([
        //         'user_id' => auth()->user()->id,
        //         'nombre' => $request->nombre,
        //     ]);
        //     $listaArtista->save();
        // }

        // if ($request->hasFile("images")) {
        //     $files = $request->file("images");
        //     foreach ($files as $file) {
        //         $imageName =  Str::random(10) . $file->getClientOriginalName();
        //         $ruta = storage_path() . '\app\public\images/' . $imageName;
        //         $ruta_storage = '/storage/images/' . $imageName;
        //         Image::make($file)->resize(1200, null, function ($constraint) {
        //             $constraint->aspectRatio();
        //         })->save($ruta);

        //         $images = new ImageArtista([
        //             'artista_id' =>  $artista->id,
        //             'image' =>  $ruta_storage,

        //         ]);
        //         $images->save();
        //     }
        // }


        return view('artista.edit', compact('artista'))->with('creado', 'ok');
    }



    public function show($id)
    {
        $artista = Artista::find($id);
        $artista_id = $id;
        $artistaObras['artistaObras'] = Galeria::orderBy('artista_id')->where('artista_id', $artista_id)->get();
        return view('artista.show', compact('artista', 'artistaObras'));
    }


    public function edit($id)
    {
        $artista = Artista::find($id);
        return view('artista.edit', compact('artista'));
    }

    public function update(Request $request, $id)

    {

        $artista = Artista::findOrFail($id);

        //UPDATE NUBE CON SPACES DIGITAL OCEAN


        $cdn_url = $artista->cover_carousel;

        if ($request->hasFile("cover_carousel")) {
            $url = str_replace('https://ushuaiacultura.nyc3.cdn.digitaloceanspaces.com/cover', 'cover',  $artista->cover_carousel);
            Storage::disk('do')->delete($url);


            $file = $request->file('cover_carousel');
            $imageName =  Str::random(10) . $file->getClientOriginalName();
            $store = Storage::disk('do')->put('cover/' . $imageName,  file_get_contents($file->getRealPath()), 'public');
            $url = Storage::disk('do')->url('cover/' .  $imageName);
            $cdn_url = str_replace('digitaloceanspaces', 'cdn.digitaloceanspaces', $url);
        }

        $artista->update([
            'user_id' => auth()->user()->id,
            'nombre' => $request->nombre,
            'cover_carousel' => $cdn_url,
            'descripcion' => $request->descripcion,
            'correo' => $request->correo,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'titulo' => $request->titulo,
            'subtitulo' => $request->subtitulo,
        ]);

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName =  Str::random(10) . $file->getClientOriginalName();
                $store = Storage::disk('do')->put('images/' . $imageName,  file_get_contents($file->getRealPath()), 'public');
                $url = Storage::disk('do')->url('images/' .  $imageName);
                $cdn_url = str_replace('digitaloceanspaces', 'cdn.digitaloceanspaces', $url);



                $images = new ImageArtista([
                    'artista_id' =>  $artista->id,
                    'image' =>   $cdn_url,

                ]);
                $images->save();
            }
        }

        //UPDATE CON STORAGE LOCAL
        // $url = str_replace('storage', 'public', $artista->cover_carousel);
        // $ruta_storage = $artista->cover_carousel;

        // if ($request->hasFile("cover_carousel")) {
        //     if (Storage::exists($url)) {
        //         Storage::delete($url);
        //     }
        //     $file = $request->file('cover_carousel');
        //     $imageName =  Str::random(10) . $file->getClientOriginalName();
        //     $ruta = storage_path() . '\app\public\cover/' . $imageName;
        //     $ruta_storage = '/storage/cover/' . $imageName;
        //     Image::make($file)->resize(1200, null, function ($constraint) {
        //         $constraint->aspectRatio();
        //     })->save($ruta);
        // }

        // $artista->update([
        //     'user_id' => auth()->user()->id,
        //     'nombre' => $request->nombre,
        //     'cover_carousel' => $ruta_storage,
        //     'descripcion' => $request->descripcion,
        //     'correo' => $request->correo,
        //     'instagram' => $request->instagram,
        //     'facebook' => $request->facebook,
        //     'titulo' => $request->titulo,
        //     'subtitulo' => $request->subtitulo,
        // ]);

        // if ($request->hasFile("images")) {
        //     $files = $request->file("images");
        //     foreach ($files as $file) {
        //         $imageName =  Str::random(10) . $file->getClientOriginalName();
        //         $ruta = storage_path() . '\app\public\images/' . $imageName;
        //         $ruta_storage = '/storage/images/' . $imageName;
        //         Image::make($file)->resize(1200, null, function ($constraint) {
        //             $constraint->aspectRatio();
        //         })->save($ruta);

        //         $images = new ImageArtista([
        //             'artista_id' =>  $artista->id,
        //             'image' =>  $ruta_storage,

        //         ]);
        //         $images->save();
        //     }
        // }


        return redirect()->back()->with('actualizado', 'ok');
    }

    public function destroy($id)
    {

        //DESTROY EN NUBE SPACES DIGITAL OCEAN

        $Artista = Artista::findOrFail($id);
        $url = str_replace('https://ushuaiacultura.nyc3.cdn.digitaloceanspaces.com/cover', 'cover',  $Artista->cover_carousel);
        Storage::disk('do')->delete($url);


        $images = ImageArtista::where("artista_id", $Artista->id)->get();

        foreach ($images as $image) {
            $url = str_replace('https://ushuaiacultura.nyc3.cdn.digitaloceanspaces.com/images', 'images',  $image->image);
            Storage::disk('do')->delete($url);
        }



        //DESTROY CON LOCAL STORAGE FUNCIONA PERFECTO
        // $Artista = Artista::findOrFail($id);
        // $url = str_replace('storage', 'public', $Artista->cover_carousel);
        // if (Storage::exists($url)) {
        //     Storage::delete($url);
        // }
        // $images = ImageArtista::where("artista_id", $Artista->id)->get();
        // foreach ($images as $image) {
        //     $urlImages = str_replace('storage', 'public', $image->image);
        //     Storage::delete($urlImages);
        // }




        $Artista->delete();
        return redirect('/#artistas')->with('eliminar', 'eliminado');
    }
    public function deletecover($id)
    {
        //DESTROY INDIVIDUAL DEL COVER EN LA NUBE DE SPACES DIGITAL OCEAN
        $cover_carousel = Artista::findOrFail($id)->cover_carousel;
        $url = str_replace('https://ushuaiacultura.nyc3.cdn.digitaloceanspaces.com/cover', 'cover',  $cover_carousel);
        Storage::disk('do')->delete($url);



        //DESTROY INDIVIDUAL CON STORAGE LOCAL FUNCIONA PERFECTAMENTE
        // $cover_carousel = Artista::findOrFail($id)->cover_carousel;
        // $url = str_replace('storage', 'public', $cover_carousel);
        // if (Storage::exists($url)) {
        //     Storage::delete($url);
        // }



        // antiguo
        // $cover_carousel = Artista::findOrFail($id)->cover_carousel;
        // if (File::exists("cover/" . $cover_carousel)) {
        //     File::delete("cover/" . $cover_carousel);
        // }
        return back();
    }

    public function deleteimage($id)
    {

        // DESTROY INDIVIDUAL DE LAS FOTOS EN LA NUBE CON SPACES DIGITAL OCEAN
        $images = ImageArtista::findOrFail($id);
        $url = str_replace('https://ushuaiacultura.nyc3.cdn.digitaloceanspaces.com/images', 'images',  $images);
        Storage::disk('do')->delete($url);
        ImageArtista::find($id)->delete();



        //DESTROY INDIVIDUAL DE LA FOTOS CON STORAGE LOCAL FUNCIONA PERFECTAMENTE
        // $images = ImageArtista::findOrFail($id);
        // $url = str_replace('storage', 'public', $images);
        // if (Storage::exists($url)) {
        //     Storage::delete($url);
        // }
        // ImageArtista::find($id)->delete();



        // Anterior funcion
        // $images = ImageArtista::findOrFail($id);
        // if (File::exists("images/" . $images->image)) {
        //     File::delete("images/" . $images->image);
        // }
        // ImageArtista::find($id)->delete();
        return back();
    }
}
