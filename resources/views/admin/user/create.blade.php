<x-layouts.app :title="__('Crear Usuario')">
    <div class="flex flex-col gap-4">
        <!-- Encabezado con navegación -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 p-2">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Crear Nuevo Usuario</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Añade un nuevo usuario a tu tienda</p>
            </div>

            <div>
                <a href="{{ route('user.index') }}"
                    class="inline-flex items-center justify-center rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-pink-500 dark:focus:ring-pink-400 focus:ring-offset-2 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Volver a la lista
                </a>
            </div>
        </div>

        <!-- Formulario de creación de usuario -->
        <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm">
            <form action="{{ route('user.store') }}" method="POST" class="p-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Información personal -->
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-white">Información Personal</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Información básica del usuario</p>
                        </div>

                        <!-- Nombre -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre
                                completo</label>
                            <div class="mt-1">
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-pink-500 focus:ring-pink-500 dark:bg-gray-800 dark:text-white sm:text-sm"
                                    required>
                            </div>
                            @error('name')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Correo
                                electrónico</label>
                            <div class="mt-1">
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-pink-500 focus:ring-pink-500 dark:bg-gray-800 dark:text-white sm:text-sm"
                                    required>
                            </div>
                            @error('email')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Teléfono -->
                        <div>
                            <label for="phone"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Teléfono</label>
                            <div class="mt-1">
                                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}"
                                    class="block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-pink-500 focus:ring-pink-500 dark:bg-gray-800 dark:text-white sm:text-sm"
                                    required>
                            </div>
                            @error('phone')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Información de cuenta -->
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-white">Información de Cuenta</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Detalles de acceso y permisos</p>
                        </div>

                        <!-- Rol -->
                        <div>
                            <label for="role"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rol</label>
                            <div class="mt-1">
                                <select name="role" id="role"
                                    class="block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-pink-500 focus:ring-pink-500 dark:bg-gray-800 dark:text-white sm:text-sm"
                                    required>
                                    <option value="">Seleccionar rol</option>
                                    <option value="Cliente">Cliente</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                            @error('role')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Contraseña -->
                        <div>
                            <label for="password"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contraseña</label>
                            <div class="mt-1 relative">
                                <input type="password" name="password" id="password"
                                    class="block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-pink-500 focus:ring-pink-500 dark:bg-gray-800 dark:text-white sm:text-sm pr-10"
                                    required>
                                <button type="button" id="togglePassword"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" id="eyeIcon">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Mínimo 8 caracteres, debe incluir
                                letras y números</p>
                            @error('password')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div>
                            <label for="password_confirmation"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirmar
                                Contraseña</label>
                            <div class="mt-1">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-pink-500 focus:ring-pink-500 dark:bg-gray-800 dark:text-white sm:text-sm"
                                    required>
                            </div>
                            @error('password_confirmation')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="mt-6 flex justify-end gap-3">
                    <a href="{{ route('user.index') }}"
                        class="inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 py-2 px-4 text-sm font-medium text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transition-colors duration-200">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="inline-flex justify-center rounded-md border border-transparent bg-pink-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transition-colors duration-200">
                        Guardar Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Script para mostrar/ocultar contraseña
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (togglePassword && password && eyeIcon) {
                togglePassword.addEventListener('click', function() {
                    // Cambiar el tipo de input
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);

                    // Cambiar el icono
                    if (type === 'text') {
                        eyeIcon.innerHTML = `
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        `;
                    } else {
                        eyeIcon.innerHTML = `
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        `;
                    }
                });
            }
        });
    </script>
</x-layouts.app>