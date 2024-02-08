<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoresRequest;
use App\Models\Province;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::with(['province'])->get();

        return view('admin.Store.Index', ['stores' => $stores]);
    }

    public function create()
    {
        $provinces = Province::all();

        return view('admin.Store.Create',['provinces' => $provinces]);
    }

    public function store(StoresRequest $request)
    {
        Store::create($request->all());

        return redirect()->back();
    }

    public function show($id)
    {
        $store = Store::find($id)->with('province')->get();

        $employees = User::all()->where('store_id', '=', $store[0]['id']);

        return view('admin.Store.Show',['store' => $store, 'employees' => $employees]);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, Store $store)
    {
        //
    }

    public function destroy(Store $store)
    {
        //
    }
}
