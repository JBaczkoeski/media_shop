<?php

namespace App\services\Admin;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class EmployeeService
{
    public function index()
    {
        return User::role(['shop_worker', 'warehouse_worker', 'shop_manager'])->with('province','store','warehouse')->get();
    }

    public function store(EmployeeRequest $request)
    {
        $user = User::create($request->validated());

        if ($request->position === 'shop_worker') {
            $user->assignRole('shop_worker');
        } elseif ($request->position === 'warehouse_worker') {
            $user->assignRole('warehouse_worker');
        } else {
            $user->assignRole('shop_manager');
        }
    }

    public function update(ProductRequest $request, Product $product): void
    {
        //
    }

    public function destroy(Product $product): void
    {
       //
    }
}
