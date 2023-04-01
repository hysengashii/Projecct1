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

                    <table class="w-full">
                        <thead class="bg-white border-b">
                        @if($orders && count($orders) > 0)
                            <tr>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">ID</th>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">Fullname</th>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">Email</th>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">Phone</th>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-900 ">Edit</th>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-900 ">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr class="bg-gray-100 border-b">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $order->id }}</td>
                                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ $order->fullname }}</td>
                                    <td  class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ $order->email }}</td>
                                    <td  class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ $order->phone }}
                                    <td > <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{ route('orders.index', $order) }}"> Edit</a></td>
                                    <td>
                                <form  action="{{ route('orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"  class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                    </form></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                                     @else
                                    <div class="p-4 mb-4 text-red-800 rounded-lg bg-red-50  dark:text-red-400" role="alert">
                                        <span class="font-medium">0 Order!</span>
                                    </div>
                                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
