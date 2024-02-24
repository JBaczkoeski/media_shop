<?php

namespace App\services\Admin;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EmployeeService
{
    public function index()
    {
        return User::role(['shop_worker', 'warehouse_worker', 'shop_manager'])->with('province', 'store', 'warehouse')->get();
    }

    public function store(EmployeeRequest $request)
    {
        $password = Str::random(10);

        $validated = $request->validated();
        $validated['password'] = Hash::make($password);

        $user = User::create($validated);

        if ($request->position === 'shop_worker') {
            $user->assignRole('shop_worker');
        } elseif ($request->position === 'warehouse_worker') {
            $user->assignRole('warehouse_worker');
        } else {
            $user->assignRole('shop_manager');
        }

        return $user;
    }

    public function update(ProductRequest $request, Product $product): void
    {
        //
    }

    public function destroy(Product $product): void
    {
        //
    }

    public function  sendMail($email, $user)
    {
        Mail::send('emails.employee', ['user' => $user], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Twoje konto pracowanicze');
        });
    }
}
