<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Asegúrate de que el usuario esté autenticado
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role !== 'admin') {
                abort(403, 'Acceso Restringido.'); // Asegúrate de que solo los administradores puedan acceder
            }
            return $next($request);
        });
    }

    public function index()
    {
        // Obtén todos los usuarios
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        // Muestra el formulario de edición del usuario
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:15', // Validación del campo phone
            'role' => 'required|string|in:user,admin',
        ]);
    
        $user->update($request->all());
    
        return redirect()->route('users.index')->with('success', 'Usuario actualizado.');
    }
}
