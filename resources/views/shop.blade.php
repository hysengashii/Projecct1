@extends('layouts.front')
@section('title', 'Shop')

@section('content')

{{-- search --}}
<section class="p-5 search">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12">
                <form action="" method="get">
                    <input type="search" name="search" id="search" placeholder="Search" class="form-control" required>
                </form>
            </div>
            <div class="offset-lg-1 offset-md-1 offset-sm-0 col-lg-4 col-md-4 col-sm-12">
                <form action="" method="get">
                    <select name="sort" id="sort" class="form-control" required>
                        <option value="">Sort by</option>
                        <option value="name_asc">Name A-Z</option>
                        <option value="name_desc">Name Z-A</option>
                        <option value="price_asc">Price L-H</option>
                        <option value="price_asc">Price H-L</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
</section>





        {{-- products --}}

        <section class="p-5 products">
            <div class="container">
                <h2 class="mx-auto text-center">Latest Product</h2>
                <div class="row">
                    @if ($products && count($products) > 0)
                        @foreach ($products as $product)
                        <div class="col-lg-2 col-md-5 col-sm-12" >
                            <div class="card">
                                <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" height="200px">
                                <div class="card-body">
                                <h5 class="card-title text-center">{{$product->name}}</h5>
                                <div class="flow-root h-auto ">
                                    <div class="my-4 h-auto text-center "><p class="card-text">{{$product->description}}</p></div>
                                </div>
                                <div class="flow-root h-auto">
                                    <div class="my-4 h-auto text-center"><b class="card-text">{{ number_format($product->price,2) }}$</b></div>
                                </div>

                                <div class="text-center ">
                                    <a href="#" class="btn btn-primary ">View Productt</a>
                                </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                            @else
                            <div class="p-4 mb-4 text-red-800 rounded-lg bg-red-50  dark:text-red-400" role="alert">
                                <span class="font-medium">0 Product!</span>
                            </div>
                    @endif
                </div>
                <div class="pagination mx-auto">
                    {{ $products->links() }}
                </div>
            </div>
        </section>



@endsection










