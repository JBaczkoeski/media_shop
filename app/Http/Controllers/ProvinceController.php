<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProvincesRequest;
use App\Models\Province;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinces = Province::all();

        return view('admin.provinces',['provinces' => $provinces]);
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
