<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\services\OrderService;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        return view('user.order', ['orders' => $this->orderService->index()]);
    }
}
