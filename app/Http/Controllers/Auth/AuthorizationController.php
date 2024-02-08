<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthorizationController extends Controller
{
    public function login(LoginRequest $request){
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            if (auth()->user()->hasRole('admin')) {
                return redirect('/admin');
            }
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Podane dane są nieprawidłowe.',
        ]);
    }

    public function register(RegisterRequest $request){

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->assignRole('user');

        return view('home');
    }

    public function logout(){

        Auth()->logout();

        return redirect()->intended('/');
    }
}
