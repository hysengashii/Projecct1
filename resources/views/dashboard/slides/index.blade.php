<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Slides') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <a href="{{ route('slides.create') }}">Create Slide</a><br>
                @if ($slides && count($slides) > 0)
                <div class="table-responsive">
                    <div class="table table-borders">
                        <tr>
                            <th>Id</th>
                            <th>Slide</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($slides as $slide )
                        <tr>
                            <td>{{ $slide->id}}</td>
                            <td>{{ $slide->title}}</td> <br>
                            <td>{{ $slide->subtitle}}</td>
                            <td>
                                <a href="{{ route('slides.edit',['slide'=>$slide->id])}} "> Edit</a>
                                <form action="{{ route('slides.destroy',['slide'=>$slide->id]) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </div>
                </div>
                @else
                <p>0 Slides</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
