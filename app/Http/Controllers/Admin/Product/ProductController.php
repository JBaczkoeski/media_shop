<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Services\Admin\ProductService;
use App\Services\ProductFilterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    protected $productFilterService;

    protected $productService;

    public function __construct(ProductFilterService $productFilterService, ProductService $productService)
    {
        $this->productFilterService = $productFilterService;
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $products = $this->productFilterService->filteredProducts($request);
        $viewData = $this->productService->index($products, $request->min_price, $request->max_price);

        if (Auth::check() && Auth::user()->hasRole('admin')) {
            return view('admin.Product.Index', ['viewData' => $viewData]);
        } else {
            return view('user.products', ['viewData' => $viewData])->withInput($request->all());
        }
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $products = Product::where('name', 'like', "%{$query}%")->paginate(10);

        $categories = Category::all();
        $brands = Brand::all();

        if (Auth::user()->hasRole('admin')) {
            return view('admin.Product.Index', ['products' => $products])->render();
        } elseif (Auth::user()->hasRole('user')) {
            return view('user.products', ['products' => $products, 'categories' => $categories, 'brands' => $brands]);
        }
    }

    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.Product.Edit', ['product' => $product, 'brands' => $brands, 'categories' => $categories]);
    }

    public function archive($id)
    {
        $product = Product::find($id);

        $product->archived = 1;
        $product->save();

        return redirect()->back()->with('success', 'Produkt został pomyślnie zarchiwizowany');
    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->productService->update($request, $product);

        return redirect()->route('products');
    }

    public function show(Product $product)
    {
        if (Auth::user()->hasRole('admin')) {
            return view('admin.product', $product);
        } elseif (Auth::user()->hasRole('user')) {
            return view('user.product', $product);
        }
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.Product.Create', ['brands' => $brands, 'categories' => $categories]);
    }

    public function store(ProductRequest $request)
    {
        $this->productService->store($request);

        $request->session()->flash('status', 'Produkt został dodany!');

        return redirect()->back()->with('success', 'Produkt dodano pomyślnie');
    }

    public function delete(Product $product)
    {
        $this->productService->destroy($product);

        return redirect()->back()->with('success', 'Produkt usunięto pomyślnie');
    }
}
