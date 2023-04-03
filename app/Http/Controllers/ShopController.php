<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::paginate(6);

        if(isset($request->search) && strlen($request->search) > 1) {
            $products = Product::where('name', 'LIKE', '%'.$request->search.'%')->paginate(6);
        }

        return view('shop', [
            'products' => $products
        ]);

        
    }


}
