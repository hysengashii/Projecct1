@extends('layouts.front')
@section('title', 'Shop')

@section('content')

{{-- search --}}
<section class="p-5 search">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12">
                <form action="{{ route('shop')}}" method="get">
                    <input type="search" name="search" id="search" placeholder="Search" class="form-control" required value="{{ request('search') }}">
                </form>
            </div>
            <div class="offset-lg-1 offset-md-1 offset-sm-0 col-lg-4 col-md-4 col-sm-12">
                <form action="{{ route('shop')}}" method="GET">
                    <select name="sort" id="sort" class="form-control" required>
                        <option value="">Sort by</option>
                        <option value="name_asc"{{ request('sort') == 'name_asc' ? ' selected' : '' }}>Name (A-Z)</option>
                        <option value="name_desc"{{ request('sort') == 'name_desc' ? ' selected' : '' }}>Name (Z-A)</option>
                        <option value="price_asc"{{ request('sort') == 'price_asc' ? ' selected' : '' }}>Price (Low to High)</option>
                        <option value="price_desc"{{ request('sort') == 'price_desc' ? ' selected' : '' }}>Price (High to Low)</option>
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
                                <h5 class="text-center card-title">{{$product->name}}</h5>
                                <div class="flow-root h-auto ">
                                    <div class="h-auto my-4 text-center "><p class="card-text">{{$product->description}}</p></div>
                                </div>
                                <div class="flow-root h-auto">
                                    <div class="h-auto my-4 text-center"><b class="card-text">{{ number_format($product->price,2) }}$</b></div>
                                </div>

                                <div class="text-center ">
                                    <a href="{{ route('products.show', $product)}}" class="btn btn-primary ">View Productt</a>
                                </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                            @else
                            <div class="p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:text-red-400" role="alert">
                                <span class="font-medium">0 Product!</span>
                            </div>
                    @endif
                </div>

                <div class="mt-4 d-flex align-items-center justify-content-center pagination">
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </section>
@endsection


@section('js')
        document.getElementById('sort').addEventListener('change', (e)=> {
            window.location.href = '?sort='+e.target.value
    })
@endsection









