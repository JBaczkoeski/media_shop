<?php

namespace App\services\Admin;

use App\Http\Requests\ProvinceRequest;
use App\Models\Province;

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
