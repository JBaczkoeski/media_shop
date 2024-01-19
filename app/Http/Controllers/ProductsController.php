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
        $products = Product::with(['category', 'brand'])->where('archived', 0)->get();

        if (Auth::user()->hasRole('admin')) {
            return view('admin.products', ['products' => $products]);
        } elseif (Auth::user()->hasRole('user')) {
            return view('user.products', $products);
        }
    }

    public function indexArchived()
    {
        $products = Product::with(['category', 'brand'])->where('archived', 1)->get();

        return view('admin.archivedProducts', ['products' => $products]);
    }

    public function edit($id){
        $product = Product::with(['category', 'brand'])->find($id);

        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.editProduct', ['product' => $product,'brands' => $brands,'categories' => $categories]);
    }

    public function archive($id){
        $product = Product::find($id);

        $product -> archived = 1;
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

    public function delete($id){
        Product::destroy($id);

        return redirect()->back()->with('success', 'Produkt usunięto pomyślnie');
    }
}
