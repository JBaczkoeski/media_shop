<?php

namespace App\Services\Admin;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class ProductService
{
    public function index($products, $min_price, $max_price): array
    {
        $category_name = null;
        $firstProduct = $products->first();

        if ($firstProduct) {
            $category_name = Category::find($firstProduct->category_id);
        }        $categories = Category::all();
        $brands = Brand::all();

        return [
            'products' => $products,
            'category' => $category_name,
            'categories' => $categories,
            'brands' => $brands,
            'min_price' => $min_price,
            'max_price' => $max_price,
        ];
    }

    public function store(ProductRequest $request): void
    {
        Product::create($request->validated());

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Product successfully created.',
        ]);
    }

    public function update(ProductRequest $request, Product $product): void
    {
        $product->update($request->validated());

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Product successfully updated.',
        ]);
    }

    public function destroy(Product $productCategory): void
    {
        $productCategory->delete();

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Product category successfully deleted.',
        ]);
    }
}
