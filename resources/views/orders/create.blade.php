<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">{{ session('error') }}</div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('order.store') }}">
                    @csrf

                    <h3 class="text-lg font-medium text-gray-900 mb-4">Customer Info</h3>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <x-input-label for="first_name" value="First Name" />
                            <x-text-input id="first_name" name="first_name" class="block mt-1 w-full" :value="old('first_name')" required />
                        </div>
                        <div>
                            <x-input-label for="last_name" value="Last Name" />
                            <x-text-input id="last_name" name="last_name" class="block mt-1 w-full" :value="old('last_name')" required />
                        </div>
                        <div class="col-span-2">
                            <x-input-label for="phone" value="Phone" />
                            <x-text-input id="phone" name="phone" class="block mt-1 w-full" :value="old('phone')" required />
                        </div>
                    </div>

                    <h3 class="text-lg font-medium text-gray-900 mb-4">Products</h3>
                    <div class="space-y-3 mb-6">
                        @foreach($products as $i => $p)
                            <div class="flex items-center gap-4 border rounded p-3">
                                <div class="flex-1">
                                    <span class="font-medium">{{ $p->product_name }}</span>
                                    <span class="text-sm text-gray-500 ms-2">(Stock: {{ $p->stock_qty }})</span>
                                </div>
                                <div class="text-sm text-gray-600">₱{{ number_format($p->price, 2) }}</div>
                                <input type="hidden" name="products[{{ $i }}][id]" value="{{ $p->id }}">
                                <x-text-input type="number" name="products[{{ $i }}][qty]" min="0" value="0" class="w-24" />
                            </div>
                        @endforeach
                    </div>

                    <x-primary-button>Place Order</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>