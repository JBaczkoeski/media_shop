<?php

namespace App\services\Admin;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProvinceRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Province;
use App\Models\User;

class ProvinceService
{
    public function store(ProvinceRequest $request)
    {
        Province::create($request->validated());
    }

    public function destroy(Province $province): void
    {
        $province->delete();
    }
}
