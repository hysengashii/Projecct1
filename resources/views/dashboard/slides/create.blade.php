<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Slides') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('status'))
                        {{ Session::get('status') }}
                    @endif
               <form action="{{ route('slides.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" placeholder="Enter title">
                    <input type="text" name="subtitle" placeholder="Enter subtitle">
                    <input type="file" name="image" >
                    <button type="submit">Submit</button>
               </form>
            </div>
        </div>
    </div>
</x-app-layout>
