<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Home_images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    public function main()
    {
        $datoHome['home'] = Home::find(11);
        return view('home.main', $datoHome);
    }


    public function index()
    {
        $datosHome['homes'] = Home::all();
        return view('home.index', $datosHome);
    }


    public function create()
    {
        return view('home.create');
    }

    public function store(Request $request)
    {
        $campos = ['titulo' => 'required|string|max:350', 'descripcion' => 'required|string|max:400', 'images' => 'required|',];
        $this->validate($request, $campos);

        $home = new Home(['titulo' => $request->titulo, 'descripcion' => $request->descripcion,]);
        $home->save();

      // con spaces
      if ($request->hasFile("images")) {
        $file = $request->file('images');

        $imageName =   Str::random(10) . $file->getClientOriginalName();


        $store = Storage::disk('do')->put('carousel/' . $imageName, file_get_contents($request->file('images')->getRealPath()), 'public');

        $url = Storage::disk('do')->url('carousel/' . $imageName);

        $cdn_url = str_replace('digitaloceanspaces', 'cdn.digitaloceanspaces', $url);


        $home_images = new Home_images([
            'home_id' =>  $home->id,
            'image' =>  $cdn_url,
        ]);
        $home_images->save();
    }




// Storage funciona perfecto con optimizacion de imagenes
        // if ($request->hasFile("images")) {
        //     $files = $request->file("images");
        //     foreach ($files as $file) {
        //         $imageName =  Str::random(10) . $file->getClientOriginalName();
        //         $ruta = storage_path() . '\app\public\carousel/' . $imageName;
        //         $ruta_storage = '/storage/carousel/' . $imageName;
        //         Image::make($file)->resize(1200, null, function ($constraint) {
        //             $constraint->aspectRatio();
        //         })->save($ruta);


        //         $home_images = new Home_images([
        //             'home_id' =>  $home->id,
        //             'image' =>  $ruta_storage,

        //         ]);
        //         $home_images->save();
        //     }

        //     Antiguo
        //     $files = $request->file("images");
        //     foreach ($files as $file) {
        //         $imageName = time() . '_' . $file->getClientOriginalName();
        //         $request['home_id'] = $home->id;
        //         $request['image'] = $imageName;
        //         $file->move(\public_path("/carousel"), $imageName);
        //         Home_images::create($request->all());
        //     }
        //  }
        return redirect("/home/");
    }


    public function edit($id)
    {
        $homes = Home::findOrFail($id);
        return view('home.edit', compact('homes'));
    }

    public function update(Request $request, $id)
    {
        $campos = ['titulo' => 'required|max:350', 'descripcion' => 'required|string|max:400',];

        if ($request->hasFile("images")) {
            $campos = ['images' => 'required',];
        }
        $this->validate($request, $campos);

        $home = Home::findOrFail($id);
        $home->update([
            "titulo" => $request->titulo,
            "descripcion" => $request->descripcion,
        ]);

// STORE CON SPACES
        // if ($request->hasFile("images")) {
        //     $file = $request->file('images');

        //     $imageName =   Str::random(10) . $file->getClientOriginalName();


        //     $store = Storage::disk('do')->put('carousel/' . $imageName, file_get_contents($request->file('images')->getRealPath()), 'public');

        //     $url = Storage::disk('do')->url('carousel/' . $imageName);

        //     $cdn_url = str_replace('digitaloceanspaces', 'cdn.digitaloceanspaces', $url);


        //     $home_images = new Home_images([
        //         'home_id' =>  $home->id,
        //         'image' =>  $cdn_url,
        //     ]);
        //     $home_images->save();
        // }
// STORE CON SPACES


  // con spaces
  if ($request->hasFile("images")) {
    $files = $request->file('images');
    foreach ($files as $file) {
        $extension = $file->getClientOriginalExtension();
        $imageName =   Str::random(10) . $file->getClientOriginalName();
        // $image = Image::make($file)->resize(1200, null, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->encode($extension);

        $store = Storage::disk('do')->put('carousel/'.$imageName,  file_get_contents($request->file('images')->getRealPath()), 'public');

        $url = Storage::disk('do')->url('carousel/' .  $imageName);

        $cdn_url = str_replace('digitaloceanspaces', 'cdn.digitaloceanspaces', $url);

        $home_images = new Home_images([
            'home_id' =>  $home->id,
            'image' =>  $cdn_url,
        ]);
        $home_images->save();
    }
}




        //   STORAGE LOCAL FUNCIONA PERFECTO
        // if ($request->hasFile("images")) {
        //     $files = $request->file('images');
        //     foreach ($files as $file) {
        //         $imageName =  Str::random(10) . $file->getClientOriginalName();
        //         $ruta = storage_path() . '\app\public\carousel/' . $imageName;
        //         $ruta_storage = '/storage/carousel/' . $imageName;
        //         Image::make($file)->resize(1200, null, function ($constraint) {
        //             $constraint->aspectRatio();
        //         })->save($ruta);

        //         $home_images = new Home_images([
        //             'home_id' =>  $home->id,
        //             'image' =>  $ruta_storage,

        //         ]);
        //         $home_images->save();
        //     }

        // }


        return redirect("/")->with('actualizado', 'ok');
    }




    public function destroy($id)
    {
        $homes = Home::findOrFail($id);
        $images = Home_images::where("home_id", $homes->id)->get();
        foreach ($images as $image) {
            $urlImages = str_replace('storage', 'public', $image->image);
            if (Storage::exists($urlImages)) {
                Storage::delete($urlImages);
            }
        }
        $homes->delete();
        return back();
    }

    public function deleteimage($id)
    {

        $images = Home_images::find($id);
        $url = str_replace('storage', 'public', $images->image);
        if (Storage::exists($url)) {
            Storage::delete($url);
        }
        Home_images::find($id)->delete();
        return back();



        // FUNCION ANTIGUA DE BORRADO SIN EL STORAGE
        // $images = Home_images::findOrFail($id);
        // if (File::exists("carousel/" . $images->image)) {
        //     File::delete("carousel/" . $images->image);
        // }
        // Home_images::find($id)->delete();
        // return back();
    }
}
