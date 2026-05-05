<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stock In') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">{{ session('error') }}</div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('stock.in') }}">
                    @csrf

                    <div class="mb-4">
                        <x-input-label for="product_id" value="Product" />
                        <select name="product_id" id="product_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                            <option value="">-- Select Product --</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }} (Stock: {{ $product->stock_qty }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="supplier_id" value="Supplier" />
                        <select name="supplier_id" id="supplier_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                            <option value="">-- Select Supplier --</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="quantity" value="Quantity" />
                        <x-text-input id="quantity" name="quantity" type="number" min="1" class="block mt-1 w-full" required />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="unit_cost" value="Unit Cost (₱)" />
                        <x-text-input id="unit_cost" name="unit_cost" type="number" step="0.01" min="0" class="block mt-1 w-full" required />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="delivery_date" value="Delivery Date" />
                        <x-text-input id="delivery_date" name="delivery_date" type="date" class="block mt-1 w-full" required />
                    </div>

                    <x-primary-button>Add Stock</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>