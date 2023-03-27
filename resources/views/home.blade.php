@extends('layouts.front')
@section('title', 'Home')

@section('content')


            {{--  Slider --}}
            @if ($slides)
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-inner">
                    @foreach ($slides as $slide )
                        <div class="carousel-item active">
                            <img src="{{ asset('storage/slides/'.$slide->image) }}" class="d-block w-100" alt="{{ $slide->title}}">
                            <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $slide->title }}</h5>
                            <p>{{ $slide->subtitle }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            @endif




        {{-- latest product --}}

        <section class="p-5 latest-products">
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



        {{-- inner --}}
        <section class="py-5 intro">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <img src="https://www.rd.com/wp-content/uploads/2020/04/GettyImages-1093840488-5-scaled.jpg" class="card-img-top" alt="...">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <h3>eStore</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam impedit animi est accusantium consequuntur delectus hic deserunt officia. Eum, unde.</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
        </section>

@endsection










