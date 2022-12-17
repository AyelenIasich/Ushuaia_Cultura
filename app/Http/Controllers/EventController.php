<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Artist;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{


    public function __construct()
    {
        // $this->middleware('can:events.index')->only('index');
        $this->middleware('can:events.create')->only('create', 'store');
        $this->middleware('can:events.edit')->only('edit', 'update');
        $this->middleware('can:events.destroy')->only('destroy');
    }


    // Vista de la totalidad de eventos si sos admin podes ver todos los eventos para poder eliminar alguno
    //sino se muestra los eventos que sea igual o mayor a la fecha de hoy
    public function index()
    {
        $CategoriasEvento = Category::all();

        if (!Auth::check()) {

            $events = Event::where('fecha_evento', '>=', now())->with(['artists'])->paginate(6);
        }
        if (Auth::check()) {
            if (auth()->user()->id == 1) {
                $events = Event::with(['artists'])->paginate(6);
            }
        }
        if (Auth::check()) {
            $events = Event::where('fecha_evento', '>=', now())->with(['artists'])->paginate(6);
        }


        return view('event.index', compact('events' , 'CategoriasEvento'))
            ->with('i', (request()->input('page', 1) - 1) * $events->perPage());
    }

    public function CategoriaEvento(Category $categoria){
        $CategoriasEvento = Category::all();

        if (!Auth::check()) {

            $events = Event::where('categoria_id', $categoria->id)->where('fecha_evento', '>=', now())->with(['artists'])->paginate(6);
        }
        if (Auth::check()) {
            if (auth()->user()->id == 1) {
                $events = Event::where('categoria_id', $categoria->id)->with(['artists'])->paginate(6);
            }
        }
        if (Auth::check()) {
            $events = Event::where('categoria_id', $categoria->id)->where('fecha_evento', '>=', now())->with(['artists'])->paginate(6);
        }



       return view('event.categoria', compact('events', 'CategoriasEvento'));

    }



    public function misEventos()
    {
        $events = Event::where('user_id', auth()->user()->id)->with(['artists'])->paginate(10);


        return view('event.misEventos', compact('events'))->with('i', (request()->input('page', 1) - 1) * $events->perPage());
    }

    public function create()
    {
        $event = new Event();
        $artists = Artist::pluck('nombre', 'id');
        $categories = Category::pluck('nombre', 'id');
        return view('event.create', compact('artists', 'event', 'categories'));
    }


    public function store(Request $request)
    {

        $campos = [
            'categoria_id' => 'required',
            'titulo_evento' => 'required',
            'hora_evento' => 'required',
            'fecha_evento' => 'required',
            'resumen' => 'required',
            'image_evento' => 'required|image',
            'direccion' => 'required',

        ];
        $this->validate($request, $campos);


        if ($request->hasFile('image_evento')) {
            $nombre = Str::random(10) . $request->file('image_evento')->getClientOriginalName();
            $ruta = storage_path() . '\app\public\imagenEvento/' . $nombre;
            $ruta_storage = '/storage/imagenEvento/' . $nombre;
            Image::make($request->file('image_evento'))->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ruta);

            $event = new Event([
                'user_id' => auth()->user()->id,
                'categoria_id' => $request->categoria_id,
                'titulo_evento' => $request->titulo_evento,
                'hora_evento' => $request->hora_evento,
                'fecha_evento' => $request->fecha_evento,
                'resumen' => $request->resumen,
                'descripcion_evento' => $request->descripcion_evento,
                'image_evento' => $ruta_storage,
                'info_external' => $request->info_external,
                'nombre_url' => $request->nombre_url,
                'external_url' => $request->external_url,
                'direccion' => $request->direccion,
                'institucion' => $request->institucion,
            ]);
            $event->save();
        }
        $id = $event->id;
        $event->artists()->sync($request->input('artists', []));



        return redirect()->route('events.edit', $id)->with('creado', 'ok');
    }


    public function show($id)
    {
        $event = Event::find($id);
        return view('event.show', compact('event'));
    }


    public function edit($id)
    {
        $event = Event::find($id);
        $artists = Artist::pluck('nombre', 'id');
        $categories = Category::pluck('nombre', 'id');

        return view('event.edit', compact('event', 'artists', 'categories'));
    }


    public function update(Request $request, Event $event)
    {
        $event = Event::findOrFail($event->id);
        $campos = [

            'categoria_id' => 'required',
            'titulo_evento' => 'required',
            'hora_evento' => 'required',
            'fecha_evento' => 'required',
            'resumen' => 'required',
            'direccion' => 'required',

        ];

        if ($request->hasFile("image_evento")) {
            $campos = ['image_evento' => 'required|image',];
        }
        $this->validate($request, $campos);

        $ruta_storage = $event->image_evento;

        if ($request->hasFile("image_evento")) {

            $url = str_replace('storage', 'public', $event->image_evento);
            Storage::delete($url);

            $nombre = Str::random(10) . $request->file('image_evento')->getClientOriginalName();
            $ruta = storage_path() . '\app\public\imagenEvento/' . $nombre;
            $ruta_storage = '/storage/imagenEvento/' . $nombre;
            Image::make($request->file('image_evento'))->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ruta);
        }


        $event->update([
            'user_id' => auth()->user()->id,
            'categoria_id' => $request->categoria_id,
            'titulo_evento' => $request->titulo_evento,
            'hora_evento' => $request->hora_evento,
            'fecha_evento' => $request->fecha_evento,
            'resumen' => $request->resumen,
            'descripcion_evento' => $request->descripcion_evento,
            'image_evento' => $ruta_storage,
            'info_external' => $request->info_external,
            'nombre_url' => $request->nombre_url,
            'external_url' => $request->external_url,
            'direccion' => $request->direccion,
            'institucion' => $request->institucion,

        ]);
        if ($request->artists) {

            $event->artists()->sync($request->input('artists', []));
        }
        return redirect("/#eventos")->with('actualizado', 'ok');
    }



    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        $url = str_replace('storage', 'public', $event->image_evento);
        Storage::delete($url);

        $event->delete();

        return back()->with('eliminar', 'eliminado');
    }
}
