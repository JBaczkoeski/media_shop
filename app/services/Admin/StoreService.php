<?php

namespace App\services\Admin;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\StoreRequest;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;

class StoreService
{
    public function index()
    {
        return Store::with(['province'])->get();
    }

    public function store(StoreRequest $request)
    {
        Store::create($request->validated());
    }

    public function show($store)
    {
        return User::all()->where('store_id', '=', $store);

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
