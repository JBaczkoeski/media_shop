@extends('layout.user')
@section('content')
    <div class="w-full sm:flex sm:justify-center sm:items-center sm:h-screen margin-login px-3">
        <div class="w-full sm:w-1/3 text-center border-4 border-zinc-800 rounded-3xl py-12 me-72 mt-5 sm:mt-0">
            <div class="w-full text-4xl font-bold mb-14">
                Logowanie
            </div>
            <form method="post" action="{{ route('login') }}" class="w-6/12 mx-auto">
                @csrf
                <div class="my-4">
                    <input name="email" type="text"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           placeholder="E-mail">
                    @if($errors->first('email'))
                        <p class="text-red-600 text-md mt-1">{{($errors->first('email'))}}</p>
                    @endif
                </div>
                <div>
                    <input name="password" type="password"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           placeholder="Hasło">
                    @if($errors->first('password'))
                        <p class="text-red-600 text-md mt-1">{{($errors->first('password'))}}</p>
                    @endif
                </div>
                <div class="text-left my-4">
                    <a href="#"
                       class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Zresetuj
                        hasło</a>
                </div>
                <div class="mt-3">
                    <button class="btn bg-yellow-400 text-2xl font-bold rounded-3xl p-3 mt-2">Zaloguj się</button>
                </div>
            </form>
        </div>
        <div class="w-full sm:w-1/3 text-center border-4 border-zinc-800 rounded-3xl sm:my-0 my-5">
            <div class="w-full text-4xl font-bold my-5">
                Nowy klient
            </div>
            <div class="w-full text-2xl font-bold">
                Załóż konto i zyskaj dostęp do:
            </div>
            <ul class="list-none mt-6 text-lg">
                <li class="my-3 mx-auto"><i class="fas fa-check text-green-500 mr-3"></i>Szybki proces
                    zamawiania
                </li>
                <li class="my-3 mx-auto"><i class="fas fa-check text-green-500 mr-3"></i>Pełna historia
                    wszystkich zamówień
                </li>
                <li class="my-3 mx-auto"><i class="fas fa-check text-green-500 mr-3"></i>Specjalne kody
                    rabatowe
                </li>
                <li class="my-3 mx-auto"><i class="fas fa-check text-green-500 mr-3"></i>Dostęp do
                    unikalnych promocji
                </li>
            </ul>
            <div class="text-center mt-10 mb-10">
                <a href="/rejestracja" class="btn bg-yellow-400 text-2xl font-bold rounded-3xl p-3">Zarejestruj
                    się</a>
            </div>
        </div>
    </div>
@endsection
