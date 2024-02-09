<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandsRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();

        return view('admin.Product.Brand.Index')->with('brands', $brands);
    }

    public function store(BrandsRequest $request)
    {
        Brand::create($request->all());

        return redirect('/admin/produkty/marki');
    }
}
