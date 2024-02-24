<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Province;
use App\Models\Store;
use App\Models\Warehouse;
use App\services\Admin\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index()
    {
        return view('admin.Employee.Index', ['employees' => $this->employeeService->index()]);
    }

    public function create()
    {
        $provinces = Province::all();
        $stores = Store::all();
        $warehouses = Warehouse::all();

        return view('admin.Employee.Create', ['provinces' => $provinces, 'stores' => $stores, 'warehouses' => $warehouses]);
    }

    public function store(EmployeeRequest $request)
    {
        $user = $this->employeeService->store($request);

        $this->employeeService->sendMail($user['email'], $user);

        return redirect()->back();
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
