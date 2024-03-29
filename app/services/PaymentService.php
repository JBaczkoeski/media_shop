<?php

namespace App\services;

use App\Models\Cart_details;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class PaymentService
{
    public function orderInfo()
    {
        $cart = Auth::user()->cart;
        $cart_details = Cart_details::where('cart_id', '=', $cart->id)->get();

        $buy_products = [];
        $cart_sum = 0;

        foreach ($cart_details as $cart_detail) {
            $product = Product::find($cart_detail['product_id']);

            $buy_products[] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'quantity' => $cart_detail['quantity'],
                'unit_amount' => [
                    'currency_code' => 'PLN',
                    'value' => $product['price'],
                ],
            ];

            $cart_sum += $product['price'] * $cart_detail['quantity'];
        }

        return ['buy_products' => $buy_products, 'cart_sum' => $cart_sum];
    }

    public function clearCart()
    {
        $cart = Auth::user()->cart;
        Cart_details::where('cart_id', $cart->id)->delete();
        $cart->delete();
    }
}
