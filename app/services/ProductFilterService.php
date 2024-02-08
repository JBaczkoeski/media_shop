<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Product;

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

        return $query->paginate(10);
    }
}
