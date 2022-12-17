<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:categories.index')->only('index');
        $this->middleware('can:categories.create')->only('create', 'store');
        $this->middleware('can:categories.edit')->only('edit', 'update');
        $this->middleware('can:categories.destroy')->only('destroy');
    }

    public function index()
    {
        $categories = Category::paginate(8);

        return view('category.index', compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * $categories->perPage());
    }

    public function create()
    {
        $category = new Category();
        return view('category.create', compact('category'));
    }

    public function store(Request $request)
    {
        request()->validate(Category::$rules);

        $category = Category::create($request->all());

        return redirect()->route('categories.index')->with('creado', 'ok');

    }



    public function edit($id)
    {
        $category = Category::find($id);

        return view('category.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        request()->validate(Category::$rules);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('actualizado', 'ok');
    }

    public function destroy($id)
    {
        $category = Category::find($id)->delete();

        return redirect()->route('categories.index')
            ->with('eliminar', 'eliminado');
    }
}
