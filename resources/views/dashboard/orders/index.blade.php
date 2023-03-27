<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="table-responsive">
                    <div class="table table-borders">
                        <tr>
                            <th>Id</th>
                            <th>Customer</th>
                            <th>total</th>
                            <th></th>
                        </tr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
