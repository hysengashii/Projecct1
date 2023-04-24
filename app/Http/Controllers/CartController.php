<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index() {
        return view('cart');
    }



    public function add(Product $product, Request $request)
    {

        // Validate the quantity field
        $request->validate([
            'qty' => 'required|integer|min:1|lte:'.$product->qty,  // lte.product qty e din sa jan ne db produkti
        ]);

        // Get the quantity from the request or default to 1
        $quantity = $request->input('quantity', 2);

        // Add the product to the cart
         \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->qty,
        ]);

        $product->decrement('qty', 0);

        // Redirect back to the product page with a success message
        return redirect()->route('home')->with('success', 'Product added to cart successfully!');
    }



    public function inc($item)
    {
    //    \Cart::update($item,['quantity'=>1]);
    //    return redirect()->back();

        $product = Product::findOrFail($item);
            $cart_item = \Cart::get($item);

            if($cart_item['quantity'] < $product->qty) {
                \Cart::update($item, ['quantity' => 1]);
                return redirect()->back();
            } else {
                return redirect()->back()->with('cart_status', 'We only have ' .$product->qty .' ' .$product->name .' in stock!');
        }
    }


    public function dec($item) {
        $cartItem = \Cart::get($item); // Get the cart item

        if ($cartItem->quantity > 1) { // If the quantity is greater than 1, decrement it
            \Cart::update($item, array(
                'quantity' => -1,
            ));
        } else { // If the quantity is 1 or less, remove the item from the cart
            \Cart::remove($item);
        }

        return redirect()->back();
    }

    public function remove($item){
        \Cart::remove($item);
        return redirect()->back();
    }


    public function checkout(Request $request) {
        // Validate the form data
        $validatedData = $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $cartItems = \Cart::getContent(); // Get the cart items
        $total = \Cart::getTotal(); // Get the total price of the cart

        // Create an order in the database
        $order = new Order();
        $order->fullname = $validatedData['fullname'];
        $order->email = $validatedData['email'];
        $order->phone = $validatedData['phone'];
        $order->total = $total;
        $order->user_id = auth()->user()->id; // Set the user_id column to the authenticated user's ID
        $order->save();


        $pids = [];      // product id

        foreach(\Cart::getContent() as $item){
            // update stock
            $p = Product::find($item->id);
            $p->qty -= $item->quantity;
            $p->save();
        }

        // Clear the cart
        \Cart::clear();

        // Redirect the user to the thank you page
        return redirect()->route('cart.index')->with('status', 'Order was created successfully');
        
    }


}
