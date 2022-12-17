<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    public $search;

    public function __construct()
    {
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.edit')->only('edit', 'update');
        $this->middleware('can:users.destroy')->only('destroy');
    }

    public function index(Request $request)
    {
        $busqueda  = $request->busqueda;
        $users = User::where('name', 'LIKE', '%' . $busqueda . '%')->orWhere('email', 'LIKE', '%' . $busqueda . '%')->paginate(6);
        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $user = User::findOrFail($user->id);
        $user->roles()->sync($request->roles);

        return back()->with('actualizado', 'ok');
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('eliminar', 'eliminado');
    }
}
