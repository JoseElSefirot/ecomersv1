<x-layouts.app :title="__('Comprar Producto')">
    <div class="max-w-3xl mx-auto p-6 bg-white dark:bg-gray-900 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Comprar: {{ $product->name }}</h1>

        <div class="mb-6">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-md mb-4">
            <p class="text-gray-700 dark:text-gray-300 mb-2">{{ $product->description }}</p>
            <p class="text-lg font-semibold text-pink-600 dark:text-pink-400 mb-2">Precio: ${{ number_format($product->price, 2) }}</p>
            <p class="text-sm text-gray-500 dark:text-gray-400">Stock disponible: {{ $product->stock }}</p>
        </div>

        <form action="{{ route('product.processBuy', $product->id) }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cantidad</label>
                <input type="number" name="quantity" id="quantity" min="1" max="{{ $product->stock }}" value="1" required
                    class="beauty-input mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-pink-500 focus:ring-pink-500 dark:bg-gray-800 dark:text-white sm:text-sm">
                @error('quantity')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full inline-flex justify-center rounded-md border border-transparent bg-pink-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transition-colors duration-200">
                Pagar
            </button>
        </form>
    </div>
</x-layouts.app>
