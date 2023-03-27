<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <form action="" method="post">
                    @csrf
                    <input type="text" name="name" placeholder="Product name">
                    <input type="text" name="qty" placeholder="qty">
                    <input type="text" name="price" placeholder="Enter price">
                    <textarea name="description" placeholder="Description" id="" cols="30" rows="10"></textarea> 
                    <input type="file" name="image" >
                    <button type="submit">Submit</button>
               </form>
            </div>
        </div>
    </div>
</x-app-layout>
