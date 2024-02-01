<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoresRequest;
use App\Models\Province;
use App\Models\Store;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::with(['province'])->get();

        return view('admin.stores', ['stores' => $stores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Province::all();

        return view('admin.addStore',['provinces' => $provinces]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoresRequest $request)
    {
        Store::create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $store = Store::find($id)->with('province')->get();

        $employees = User::all()->where('store_id', '=', $store[0]['id']);

        return view('admin.store',['store' => $store, 'employees' => $employees]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
