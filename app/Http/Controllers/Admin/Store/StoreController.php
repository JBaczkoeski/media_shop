<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Models\Province;
use App\Models\Store;
use App\services\Admin\StoreService;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    protected $storeService;

    public function __construct(StoreService $storeService)
    {
        $this->storeService = $storeService;
    }

    public function index()
    {
        return view('admin.Store.Index', ['stores' => $this->storeService->index()]);
    }

    public function create()
    {
        return view('admin.Store.Create', ['provinces' => Province::all()]);
    }

    public function store(StoreRequest $request)
    {
        $this->storeService->store($request);

        return redirect()->route('stores');
    }

    public function show(Store $store)
    {
        return view('admin.Store.Show', ['store' => $store, 'employees' => $this->storeService->show($store['id'])]);
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
