<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandsRequest;
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
//dd($viewData);
        if (Auth::check() && Auth::user()->hasRole('admin')) {
            return view('admin.Product.Index', ['products' => $products]);
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

    public function indexArchived()
    {
        $products = Product::with(['category', 'brand'])->where('archived', 1)->get();

        return view('admin.Product.Archived.Index', ['products' => $products]);
    }

    public function edit($id)
    {
        $product = Product::with(['category', 'brand'])->find($id);

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

    public function update(ProductRequest $request)
    {
        $product = Product::find($request->input('id'));

        if (!$product) {
            return redirect()->back()->with('error', 'Produkt nie został znaleziony');
        }

        $product->update($request->all());

        return redirect()->back()->with('success', 'Produkt został pomyślnie zaktualizowany');
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (Auth::user()->hasRole('admin')) {
            return view('admin.product', $product);
        } elseif (Auth::user()->hasRole('user')) {
            return view('user.product', $product);
        }
    }

    public function store(ProductRequest $request)
    {
        $productData = $request->all();

        if ($request->hasFile('image_src')) {
            $image = $request->file('image_src');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $path = $image->storeAs('products', $filename, 'public');

            $productData['image_src'] = $path;
        }
        $productData['archived'] = 0;

        Product::create($productData);

        $request->session()->flash('status', 'Produkt został dodany!');

        return redirect()->back()->with('success', 'Produkt dodano pomyślnie');
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.Product.Create', ['brands' => $brands, 'categories' => $categories]);
    }

    public function showBrands()
    {
        $brands = Brand::all();

        return view('admin.Product.Brand.Index')->with('brands', $brands);
    }

    public function storeBrands(BrandsRequest $request)
    {

        Brand::create($request->all());

        return redirect('/admin/produkty/marki');
    }

    public function showCategories()
    {
        $categories = Category::all();

        return view('admin.Product.Category.Index')->with('categories', $categories);
    }

    public function storeCategories(BrandsRequest $request)
    {

        Category::create($request->all());

        return redirect('/admin/produkty/kategorie');
    }

    public function delete($id)
    {
        Product::destroy($id);

        return redirect()->back()->with('success', 'Produkt usunięto pomyślnie');
    }
}
