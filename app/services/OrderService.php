<?php

namespace App\services;

use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OrderService
{
    public function index()
    {
        return Order::where('user_id', '=', Auth::id())->paginate(10);
    }

    public function store($products)
    {
        $order = new Order;

        $order->user_id = Auth::id();
        $order->total_price = $products['cart_sum'];
        $order->serial_number = Str::uuid();
        $order->status = 'przyjęte';

        $order->save();

        foreach ($products['buy_products'] as $product) {
            $order_detail = new Order_detail;

            $order_detail->order_id = $order->id;
            $order_detail->product_id = $product['id'];
            $order_detail->quantity = $product['quantity'];
            $order_detail->price = $product['unit_amount']['value'];

            $order_detail->save();
        }
    }

    public function mail($item)
    {
        $user = Auth::user();
        $email = $user->email;

        $order_info = Order::where('user_id', '=', $user->id)->latest()->first();

        Mail::send('emails.order', ['order' => $item, 'user' => $user, 'order_info' => $order_info], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Potwierdzenie zamówienia');
        });
    }
}
