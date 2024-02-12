<?php

namespace App\services\Admin;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Warehouse;

class WarehouseService
{
    public function index()
    {
        return Warehouse::with(['province'])->get();
    }

    public function store(EmployeeRequest $request)
    {
        //
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
