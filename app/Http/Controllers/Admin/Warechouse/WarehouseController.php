<?php

namespace App\Http\Controllers\Admin\Warechouse;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Warehouse;
use App\services\Admin\WarehouseService;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    protected $warehouseService;

    public function __construct(WarehouseService $warehouseService)
    {
        $this->warehouseService = $warehouseService;
    }

    public function index()
    {
        return view('admin.Warehouse.Index', ['warehouses' => $this->warehouseService->index()]);
    }

     public function create()
     {
        $provinces = Province::all();

        return view('admin.Warehouse.Create',['provinces' => $provinces]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Warehouse $warehouse)
    {
        //
    }

    public function edit(Warehouse $warehouse)
    {
        //
    }

    public function update(Request $request, Warehouse $warehouse)
    {
        //
    }

    public function destroy(Warehouse $warehouse)
    {
        //
    }
}
