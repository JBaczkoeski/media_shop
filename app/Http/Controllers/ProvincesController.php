<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProvincesRequest;
use App\Models\Provinces;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProvincesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinces = Provinces::all();

        return view('admin.provinces',['provinces' => $provinces]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProvincesRequest $request)
    {
        Provinces::create($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provinces $provinces)
    {
        Provinces::destroy($provinces);

        return redirect()->back();
    }
}
