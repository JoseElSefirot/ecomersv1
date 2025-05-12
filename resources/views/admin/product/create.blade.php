<x-layouts.app :title="__('Crear Producto')">
    <div class="flex flex-col gap-4">
        <!-- Encabezado con navegación -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 p-2">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Crear Nuevo Producto</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Añade un nuevo producto a tu catálogo</p>
            </div>

            <div>
                <a href="{{ route('product.index') }}"
                    class="inline-flex items-center justify-center rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-pink-500 dark:focus:ring-pink-400 focus:ring-offset-2 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Volver al catálogo
                </a>
            </div>
        </div>

        <!-- Formulario de creación de producto -->
        <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Información básica del producto -->
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-white">Información del Producto</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Detalles básicos del producto</p>
                        </div>

                        <!-- Nombre del producto -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre
                                del producto</label>
                            <div class="mt-1">
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="beauty-input block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-pink-500 focus:ring-pink-500 dark:bg-gray-800 dark:text-white"
                                    required>
                            </div>
                            @error('name')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Descripción -->
                        <div>
                            <label for="description"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
                            <div class="mt-1">
                                <textarea name="description" id="description" rows="4"
                                    class="beauty-input block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-pink-500 focus:ring-pink-500 dark:bg-gray-800 dark:text-white sm:text-sm">{{ old('description') }}</textarea>
                            </div>
                            @error('description')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Categoría -->
                        <div>
                            <label for="category_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categoría</label>
                            <div class="mt-1">
                                <select name="category_id" id="category_id"
                                    class="beauty-input block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-pink-500 focus:ring-pink-500 dark:bg-gray-800 dark:text-white sm:text-sm"
                                    required>
                                    <option value="" disabled selected>Seleccionar categoría</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id')==$category->id ?
                                        'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Precios, stock e imagen -->
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-white">Precios e Inventario</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Información de precios y
                                disponibilidad</p>
                        </div>

                        <!-- Precio -->
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Precio
                                (MXN)</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 dark:text-gray-400 sm:text-sm">$</span>
                                </div>
                                <input type="number" name="price" id="price" value="{{ old('price') }}" min="0"
                                    step="0.01"
                                    class="beauty-input block w-full pl-7 rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-pink-500 focus:ring-pink-500 dark:bg-gray-800 dark:text-white sm:text-sm"
                                    required>
                            </div>
                            @error('price')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Stock -->
                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stock
                                disponible</label>
                            <div class="mt-1">
                                <input type="number" name="stock" id="stock" value="{{ old('stock', 1) }}" min="0"
                                    class="beauty-input block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-pink-500 focus:ring-pink-500 dark:bg-gray-800 dark:text-white sm:text-sm"
                                    required>
                            </div>
                            @error('stock')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Imagen -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagen
                                del producto</label>
                            <div
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <div class="flex flex-col items-center">
                                        <div id="image-preview" class="hidden mb-3 overflow-hidden rounded-md">
                                            <img id="preview-img" src="#" alt="Vista previa"
                                                class="h-32 w-auto object-cover">
                                        </div>
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                            viewBox="0 0 48 48" aria-hidden="true">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                        <label for="image"
                                            class="relative cursor-pointer bg-white dark:bg-gray-800 rounded-md font-medium text-pink-600 dark:text-pink-400 hover:text-pink-500 dark:hover:text-pink-300 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-pink-500">
                                            <span>Subir imagen</span>
                                            <input id="image" name="image" type="file" accept="image/*"
                                                class=" beauty-input sr-only" onchange="previewImage()">
                                        </label>
                                        <p class="pl-1">o arrastrar y soltar</p>
                                    </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        PNG, JPG, GIF hasta 2MB
                                    </p>
                                </div>
                            </div>
                            @error('image')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Opciones adicionales -->
                <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                    {{-- <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input type="checkbox" name="featured" id="featured" value="1" {{ old('featured')=='1'
                                ? 'checked' : '' }}
                                class="beauty-input h-4 w-4 rounded border-gray-300 dark:border-gray-600 text-pink-600 focus:ring-pink-500 dark:bg-gray-800">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="featured" class="font-medium text-gray-700 dark:text-gray-300">Producto
                                destacado</label>
                            <p class="text-gray-500 dark:text-gray-400">Este producto aparecerá en la sección de
                                destacados</p>
                        </div>
                    </div>

                    <div class="mt-4 flex items-start">
                        <div class="flex items-center h-5">
                            <input type="checkbox" name="active" id="active" value="1" {{ old('active', '1' )=='1'
                                ? 'checked' : '' }}
                                class="beauty-input h-4 w-4 rounded border-gray-300 dark:border-gray-600 text-pink-600 focus:ring-pink-500 dark:bg-gray-800">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="active" class="font-medium text-gray-700 dark:text-gray-300">Producto
                                activo</label>
                            <p class="text-gray-500 dark:text-gray-400">El producto estará visible en la tienda</p>
                        </div>
                    </div> --}}
                </div>

                <!-- Botones de acción -->
                <div class="mt-6 flex justify-end gap-3">
                    <a href="{{ route('product.index') }}"
                        class="inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 py-2 px-4 text-sm font-medium text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transition-colors duration-200">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="inline-flex justify-center rounded-md border border-transparent bg-pink-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transition-colors duration-200">
                        Guardar Producto
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Función para previsualizar la imagen
        function previewImage() {
            const preview = document.getElementById('preview-img');
            const previewContainer = document.getElementById('image-preview');
            const file = document.getElementById('image').files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                previewContainer.classList.remove('hidden');
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                previewContainer.classList.add('hidden');
            }
        }
    </script>
</x-layouts.app>