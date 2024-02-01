<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandsRequest;
use App\Http\Requests\ProductsRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');
        $sort = $request->get('sort', 'asc');
        $column = $request->get('column');
        $brand = $request->get('brand');
        $min_price = $request->get('min_price');
        $max_price = $request->get('max_price');

        $query = Product::query();

        if ($category) {
            $query->where('category_id', '=', $category);
        }

        if ($sort) {
            $query->orderBy('price', $sort);
        }

        if ($column) {
            $query->orderBy($column);
        }

        if ($request->filled('brand')) {
            $query->where('brand_id', $brand);
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $max_price);
        }

        $query->where('archived', 0);

        $products = $query->paginate(10);

        $category_name = Category::find($category);
        $categories = Category::all();
        $brands = Brand::all();

        if (Auth::check() && Auth::user()->hasRole('admin')) {
            return view('admin.products', ['products' => $products]);
        } else {
            return view('user.products', ['products' => $products, 'category' => $category_name, 'categories' => $categories, 'brands' => $brands, 'min_price'=>$min_price, 'max_price'=>$max_price])->withInput($request->all());
        }
    }


    public function search(Request $request)
    {
        $query = $request->get('query');
        $products = Product::where('name', 'like', "%{$query}%")->paginate(10);

        $categories = Category::all();
        $brands = Brand::all();

        if (Auth::user()->hasRole('admin')) {
            return view('admin.products', ['products' => $products])->render();
        } elseif (Auth::user()->hasRole('user')) {
            return view('user.products',['products' => $products, 'categories' => $categories, 'brands' => $brands]);
        }
    }

    public function indexArchived()
    {
        $products = Product::with(['category', 'brand'])->where('archived', 1)->get();

        return view('admin.archivedProducts', ['products' => $products]);
    }

    public function edit($id)
    {
        $product = Product::with(['category', 'brand'])->find($id);

        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.editProduct', ['product' => $product, 'brands' => $brands, 'categories' => $categories]);
    }

    public function archive($id)
    {
        $product = Product::find($id);

        $product->archived = 1;
        $product->save();

        return redirect()->back()->with('success', 'Produkt został pomyślnie zarchiwizowany');
    }

    public function update(ProductsRequest $request)
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

    public function store(ProductsRequest $request)
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

        return view('admin.addProduct', ['brands' => $brands, 'categories' => $categories]);
    }

    public function showBrands()
    {
        $brands = Brand::all();

        return view('admin.brands')->with('brands', $brands);
    }

    public function storeBrands(BrandsRequest $request)
    {

        Brand::create($request->all());

        return redirect('/admin/produkty/marki');
    }

    public function showCategories()
    {
        $categories = Category::all();

        return view('admin.categories')->with('categories', $categories);
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
