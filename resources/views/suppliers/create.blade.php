<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Supplier</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('suppliers.store') }}">
                    @csrf

                    <div class="mb-4">
                        <x-input-label for="supplier_name" value="Supplier Name" />
                        <x-text-input id="supplier_name" name="supplier_name" class="block mt-1 w-full" :value="old('supplier_name')" required />
                        <x-input-error :messages="$errors->get('supplier_name')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="contact_person" value="Contact Person" />
                        <x-text-input id="contact_person" name="contact_person" class="block mt-1 w-full" :value="old('contact_person')" required />
                        <x-input-error :messages="$errors->get('contact_person')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="phone" value="Phone" />
                        <x-text-input id="phone" name="phone" class="block mt-1 w-full" :value="old('phone')" required />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>Save Supplier</x-primary-button>
                        <a href="{{ route('suppliers.index') }}" class="text-sm text-gray-600 hover:underline">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>