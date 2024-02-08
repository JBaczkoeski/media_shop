<?php

namespace App\Http\Controllers\Admin\Warechouse;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouses = Warehouse::with(['province'])->get();

        return view('admin.Warehouse.Index', ['warehouses' => $warehouses]);
    }

    /**
     * Show the form for creating a new resource.
     */
     public function create()
     {
        $provinces = Province::all();

        return view('admin.Warehouse.Create',['provinces' => $provinces]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warehouse $warehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse $warehouse)
    {
        //
    }
}
