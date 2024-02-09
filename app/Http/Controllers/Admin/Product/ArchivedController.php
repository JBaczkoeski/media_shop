<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ArchivedController extends Controller
{

    public function index()
    {
        $products = Product::with(['category', 'brand'])->where('archived', 1)->get();

        return view('admin.Product.Archived.Index', ['products' => $products]);
    }
}
