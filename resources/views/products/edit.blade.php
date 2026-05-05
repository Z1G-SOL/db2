<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Product</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('products.update', $product) }}">
                    @csrf @method('PATCH')

                    <div class="mb-4">
                        <x-input-label for="product_name" value="Product Name" />
                        <x-text-input id="product_name" name="product_name" class="block mt-1 w-full" :value="old('product_name', $product->product_name)" required />
                        <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="category" value="Category" />
                        <x-text-input id="category" name="category" class="block mt-1 w-full" :value="old('category', $product->category)" required />
                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="price" value="Price (₱)" />
                        <x-text-input id="price" name="price" type="number" step="0.01" min="0" class="block mt-1 w-full" :value="old('price', $product->price)" required />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="stock_qty" value="Stock Quantity" />
                        <x-text-input id="stock_qty" name="stock_qty" type="number" min="0" class="block mt-1 w-full" :value="old('stock_qty', $product->stock_qty)" required />
                        <x-input-error :messages="$errors->get('stock_qty')" class="mt-2" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>Update Product</x-primary-button>
                        <a href="{{ route('products.index') }}" class="text-sm text-gray-600 hover:underline">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>