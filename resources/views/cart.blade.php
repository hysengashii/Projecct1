@extends('layouts.front')
@section('title', 'Cart')

@section('content')
        {{-- products --}}

        <section class="p-5 products">
            <div class="container">
                @if (count(Cart::getContent()) > 0)
                <h3 class="mt-5">Cart</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Product</th>
                                <th scope="col" class="text-center" width="200px">Qty</th>
                                <th scope="col" class="text-center">Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th></th>
                                <td></td>
                                <td class="d-flex justify-content-between"><a href="" class="btn btn-sm btn-outline-primary">-</a>
                                    <p>2</p>
                                    <a href="" class="btn btn-sm btn-outline-primary">+</a></td>
                                <td class="text-center">mdo</td>
                            </tr>
                            </tbody>
                      </table>
                    </div>

                    {{-- checkout --}}
                    <h3 class="mt-5">Checkout</h3>
                    <form action="" method="post">
                            <div class="mb-3">
                                <label for="fullname" name="fullname" class="form-label">Fullname</label>
                                <input type="text" name="" class="form-control" required>
                            </div>
                                <div class="mb-3">
                                    <label for="fullname" name="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                    <label for="fullname" name="phone" class="form-label">Phone</label>
                                    <input type="number" name="phone" class="form-control" id="phone" required>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </form>
                @else
                    <div class="alert alert-warning" role="alert">
                        Cart is empty!
                    </div>
                @endif
            </div>
        </section>



@endsection










