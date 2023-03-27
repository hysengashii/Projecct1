<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="{{ route('products.create') }}">Create Product</a><br>
                <div class="table-responsive">
                    <div class="table table-borders">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                        </tr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
