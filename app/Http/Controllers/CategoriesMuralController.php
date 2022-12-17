<?php

namespace App\Http\Controllers;

use App\Models\CategoriesMural;
use Illuminate\Http\Request;


class CategoriesMuralController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:categories-murales.index')->only('index');
        $this->middleware('can:categories-murales.create')->only('create', 'store');
        $this->middleware('can:categories-murales.edit')->only('edit', 'update');
        $this->middleware('can:categories-murales.destroy')->only('destroy');
    }
    public function index()
    {
        $categoriesMurales = CategoriesMural::paginate();

        return view('categories-murale.index', compact('categoriesMurales'))
            ->with('i', (request()->input('page', 1) - 1) * $categoriesMurales->perPage());
    }


    public function create()
    {
        $categoriesMurale = new CategoriesMural();
        return view('categories-murale.create', compact('categoriesMurale'));
    }


    public function store(Request $request)
    {
        request()->validate(CategoriesMural::$rules);

        $categoriesMurale = CategoriesMural::create($request->all());

        return redirect()->route('categories-murales.index')->with('creado', 'ok');
    }


    public function edit($id)
    {
        $categoriesMurale = CategoriesMural::find($id);

        return view('categories-murale.edit', compact('categoriesMurale'));
    }


    public function update(Request $request, CategoriesMural $categoriesMurale)
    {
        request()->validate(CategoriesMural::$rules);

        $categoriesMurale->update($request->all());

        return redirect()->route('categories-murales.index')->with('actualizado', 'ok');
    }


    public function destroy($id)
    {
        $categoriesMurale = CategoriesMural::find($id)->delete();

        return redirect()->route('categories-murales.index')->with('eliminar', 'eliminado');
    }
}
