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


        if ($request->hasFile("images")) {

            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName =  Str::random(10) . $file->getClientOriginalName();
                $file->move(\public_path("/carousel"), $imageName);
                // Image::make($file)->resize(1200, null, function ($constraint) {
                //     $constraint->aspectRatio();
                // })->save(\public_path("/carousel/") . $imageName);


                $home_images = new Home_images([
                    'home_id' =>  $home->id,
                    'image' =>  $imageName,

                ]);
                $home_images->save();
            }


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

            // Antiguo
            // $files = $request->file("images");
            // foreach ($files as $file) {
            //     $imageName = time() . '_' . $file->getClientOriginalName();
            //     $request['home_id'] = $home->id;
            //     $request['image'] = $imageName;
            //     $file->move(\public_path("/carousel"), $imageName);
            //     Home_images::create($request->all());
            //}
        }
         return view('home');
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


        if ($request->hasFile("images")) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $imageName =  Str::random(10) . $file->getClientOriginalName();
                Image::make($file)->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(\public_path("/carousel/") . $imageName);

                $home_images = new Home_images([
                    'home_id' =>  $home->id,
                    'image' =>  $imageName,

                ]);
                $home_images->save();
            }
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



        }


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

        // $images = Home_images::find($id);
        // $url = str_replace('storage', 'public', $images->image);
        // if (Storage::exists($url)) {
        //     Storage::delete($url);
        // }
        // Home_images::find($id)->delete();
        // return back();



     //   FUNCION ANTIGUA DE BORRADO SIN EL STORAGE
        $images = Home_images::findOrFail($id);
        if (File::exists("carousel/" . $images->image)) {
            File::delete("carousel/" . $images->image);
        }
        Home_images::find($id)->delete();
        return back();
    }
}
