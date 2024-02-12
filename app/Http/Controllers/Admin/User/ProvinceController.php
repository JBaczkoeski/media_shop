<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProvinceRequest;
use App\Models\Province;
use App\services\Admin\ProvinceService;

class ProvinceController extends Controller
{
    protected $provinceService;

    public function __construct(ProvinceService $provinceService)
    {
        $this->provinceService = $provinceService;
    }

    public function index()
    {
        return view('admin.User.Province.Index', ['provinces' => Province::all()]);
    }

    public function store(ProvinceRequest $request)
    {
        $this->provinceService->store($request);

        return redirect()->route('provinces');
    }

    public function destroy(Province $province)
    {
        $this->provinceService->destroy($province);

        return redirect()->route('provinces');
    }
}
