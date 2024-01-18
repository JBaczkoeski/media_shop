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
    public function index()
    {
        $products = Product::with(['model', 'brand'])->get();

        if (Auth::user()->hasRole('admin')) {
            return view('admin.products', $products);
        } elseif (Auth::user()->hasRole('user')) {
            return view('user.products', $products);
        }
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

        Product::create($productData);

        return redirect()->back()->with('success', 'Produkt dodano pomyślnie');
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.addProduct',['brands' => $brands,'categories' => $categories]);
    }

    public function showBrands(){
        $brands = Brand::all();

        return view('admin.brands')->with('brands', $brands);
    }
    public function storeBrands(BrandsRequest $request){

        Brand::create($request->all());

        return redirect('/admin/produkty/marki');
    }
    public function showCategories(){
        $categories = Category::all();

        return view('admin.categories')->with('categories', $categories);
    }
    public function storeCategories(BrandsRequest $request){

        Category::create($request->all());

        return redirect('/admin/produkty/kategorie');
    }
}
