<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear un usuario administrador de ejemplo
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Cambia 'password' por una contraseña segura
            'role' => 'admin', // Asignar el rol de administrador
        ]);

        // Puedes agregar más usuarios aquí si lo deseas
    }
}