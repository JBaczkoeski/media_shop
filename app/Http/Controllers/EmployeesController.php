<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Provinces;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = User::role(['shop_worker','warehouse_worker','shop_manager'])->get();

        return view('admin.employees', ['employees' => $employees, 'provinces' => $provinces]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Provinces::all();

        return view('admin.addEmployee', ['provinces' => $provinces]);
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