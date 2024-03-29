<?php

namespace App\services;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductFilterService
{
    public function filteredProducts(Request $request)
    {
        $query = Product::query();

        if ($request->filled('category')) {
            $query->where('category_id', $request->get('category'));
        }

        if ($request->filled('sort')) {
            $query->orderBy('price', $request->get('sort'));
        }

        if ($request->filled('column')) {
            $query->orderBy($request->get('column'));
        }

        if ($request->filled('brand')) {
            $query->where('brand_id', $request->get('brand'));
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->get('min_price'));
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->get('max_price'));
        }

        $query->where('archived', 0);

        return $query->paginate(12);
    }

    public function search(Request $request)
    {
        $query = $request->get('query');

        $viewData['products'] = Product::where('name', 'like', "%{$query}%")->paginate(10);

        $viewData['categories'] = Category::all();
        $viewData['brands'] = Brand::all();

        return $viewData;
    }
}
