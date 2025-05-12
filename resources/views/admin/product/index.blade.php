<x-layouts.app :title="__('Productos')">
    <!-- Encabezado con acciones -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 p-2">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Gestión de Productos</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Administra los productos de la tienda</p>
            </div>

            <div class="flex items-center gap-2">
                <div class="relative">
                    <input
                        type="text"
                        placeholder="Buscar usuarios..."
                        class="pl-9 pr-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-pink-500 dark:focus:ring-pink-400 focus:border-transparent"
                    >
                    <div class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <a href="{{ route('product.create') }}" class="inline-flex items-center justify-center rounded-lg bg-pink-500 px-4 py-2 text-sm font-medium text-white hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-500 transition-colors duration-200 data-flux-button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Nuevo Producto
                </a>
            </div>
        </div>

        <!-- Tabla de usuarios -->
        @if($products->isNotEmpty())
        <div class="overflow-x-auto flex justify-center">
            <x-admin.product-table :products="$products" />
        </div>
        @endif
    </div>
</x-layouts.app>