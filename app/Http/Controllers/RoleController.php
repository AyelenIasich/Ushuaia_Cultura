<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:roles.index')->only('index');
        $this->middleware('can:roles.create')->only('create', 'store');
        $this->middleware('can:roles.edit')->only('edit', 'update');
        $this->middleware('can:roles.destroy')->only('destroy');
    }

    public function index()
    {

        $roles = Role::paginate(5);
        return view('roles.index', compact('roles'))->with('i', (request()->input('page', 1) - 1) * $roles->perPage());;
    }


    public function create()
    {
        $permissions = Permission::all();

        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $campos = [
            'name' => 'required|string|max:100',
        ];

        $this->validate($request, $campos);
        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('roles.edit', $role)->with('creado', 'ok');
    }
    public function show(Role $role)
    {

        return view('roles.show', compact('role'));
    }


    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $campos = [
            'name' => 'required|string|max:100',
        ];

        $this->validate($request, $campos);
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('roles.edit', $role)->with('actualizado', 'ok');
    }

    public function destroy(Role $role)
    {
        $role = Role::find($role->id)->delete();
        return redirect()->route('roles.index', $role)->with('eliminar', 'eliminado');
    }
}
