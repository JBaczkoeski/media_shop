<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Provinces;
use App\Models\Store;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = User::role(['shop_worker', 'warehouse_worker', 'shop_manager'])->with('province','store','warehouse')->get();

        return view('admin.employees', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Provinces::all();
        $stores = Store::all();
        $warehouses = Warehouse::all();

        return view('admin.addEmployee', ['provinces' => $provinces, 'stores' => $stores, 'warehouses'=>$warehouses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {

        $user = User::create($request->all());
        if ($request->position == 'shop_worker') {
            $user->assignRole('shop_worker');
        } elseif ($request->position == 'warehouse_worker') {
            $user->assignRole('warehouse_worker');
        } else {
            $user->assignRole('shop_manager');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
