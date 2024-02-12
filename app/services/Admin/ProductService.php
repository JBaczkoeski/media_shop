<?php

namespace App\Services\Admin;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\services\ImageService;
use Illuminate\Http\UploadedFile;

class ProductService
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

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

    public function store(ProductRequest $request)
    {
        $productData = $request->all();

        if (isset($productData['image_src']) && $productData['image_src'] instanceof UploadedFile) {
            $productData['image_src'] = $this->imageService->handleUpload($productData['image_src'], 'product');
        }

        $productData['archived'] = 0;

        Product::create($productData);
    }

    public function update(ProductRequest $request, Product $product): void
    {
        $product->update($request->validated());

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Product successfully updated.',
        ]);
    }

    public function destroy(Product $product): void
    {
        $product->delete();

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Product category successfully deleted.',
        ]);
    }
}
