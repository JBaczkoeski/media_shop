<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandsRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.Product.Category.Index')->with('categories', $categories);
    }

    public function store(BrandsRequest $request)
    {

        Category::create($request->all());

        return redirect('/admin/produkty/kategorie');
    }
}
