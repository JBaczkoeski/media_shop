<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Cart_details;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::id();

        $cart = Cart::where('user_id', '=', $user)->first();

        if ($cart) {
            $cart_products = Cart_details::where('cart_id', '=', $cart->id)->get();

            $total = 0;

            foreach ($cart_products as $product) {
                $product_detail = Product::find($product->product_id);
                $total += $product->quantity * $product_detail->price;
                $detailed_cart_products[] = [
                    'product_detail' => $product_detail,
                    'quantity' => $product->quantity,
                ];
            }
        } else {
            return redirect()->back();
        }

        return view('user.cart', ['cart_products' => $detailed_cart_products, 'total' => $total]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($product)
    {
        $user = Auth::id();

        $exist_cart = Cart::where('user_id', '=', $user)->first();

        if ($exist_cart == null) {
            $cart = new Cart();
            $cart->user_id = $user;
            $cart->save();
        } else {
            $cart = $exist_cart;
        }

        $exist_product = Cart_details::where('cart_id', '=', $cart->id)->where('product_id', '=', $product)->first();

        if ($exist_product == null) {
            $cart_details = new Cart_details();
            $cart_details->cart_id = $cart->id;
            $cart_details->product_id = $product;
            $cart_details->quantity = 1;
            $cart_details->save();
        } else {
            $exist_product->quantity++;
            $exist_product->save();
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
