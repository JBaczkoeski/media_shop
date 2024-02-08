<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProvincesRequest;
use App\Models\Province;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinces = Province::all();

        return view('admin.Province.Index',['provinces' => $provinces]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProvincesRequest $request)
    {
        Province::create($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Province $provinces)
    {
        Province::destroy($provinces);

        return redirect()->back();
    }
}
