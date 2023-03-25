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
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card">
                            <img src="https://www.rd.com/wp-content/uploads/2020/04/GettyImages-1093840488-5-scaled.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                              <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



@endsection










