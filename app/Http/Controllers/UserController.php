<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    //
    function index()
    {
        $users = User::paginate(10); // Fetch users with pagination (10 per page)
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create'); // Asumiendo que tu vista está en resources/views/admin/user/create.blade.php
    }

    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' requiere un campo 'password_confirmation'
            'phone' => 'required|string',
            'role' => 'required|in:Admin,Cliente', // Ensure the role is either 'Admin' or 'Cliente'
        ]);

        // Crea el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hashea la contraseña
            'role' => 'cliente',
            'role' => $request->role,
        ]);

        // Redirige a alguna página, por ejemplo, la lista de usuarios
        return redirect()->route('user.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string',
            'role' => 'required|in:Admin,Cliente',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('user.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
