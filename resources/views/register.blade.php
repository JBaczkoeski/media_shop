@extends('layout.user')
@section('content')
    <div class="w-full sm:flex sm:justify-center sm:items-center sm:h-screen margin-login px-3">
        <div class="w-full sm:w-1/3 text-center border-4 border-zinc-800 rounded-3xl py-12 me-72 mt-5 sm:mt-0">
            <div class="mx-auto">
                <div class="w-full text-4xl font-bold mb-14">
                    Logowanie
                </div>
                <form method="post" action="{{ route('register') }}" class="w-6/12 mx-auto">
                    @csrf
                    <div class="my-4">
                        <input name="first_name" type="text"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               placeholder="Imię *" required>
                        @if($errors->first('first_name'))
                            <p class="text-red-600 text-md mt-1">{{($errors->first('first_name'))}}</p>
                        @endif
                    </div>
                    <div class="my-4">
                        <input name="last_name" type="text"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               placeholder="Nazwisko *" required>
                        @if($errors->first('last_name'))
                            <p class="text-red-600 text-md mt-1">{{($errors->first('last_name'))}}</p>
                        @endif
                    </div>
                    <div class="my-4">
                        <input name="email" type="text"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               placeholder="E-mail *" required>
                        @if($errors->first('email'))
                            <p class="text-red-600 text-md mt-1">{{($errors->first('email'))}}</p>
                        @endif
                    </div>
                    <div class="my-4">
                        <input name="password" type="password"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               placeholder="Hasło *" required>
                        @if($errors->first('password'))
                            <p class="text-red-600 text-md mt-1">{{($errors->first('password'))}}</p>
                        @endif
                    </div>
                    <div class="my-4">
                        <input name="password_confirmation" type="password"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               placeholder="Potwierdź hasło *" required>
                        @if($errors->first('password_confirmation'))
                            <p class="text-red-600 text-md mt-1">{{($errors->first('password_confirmation'))}}</p>
                        @endif
                    </div>
                    <div class="mb-5">
                        <button class="btn bg-yellow-400 text-2xl font-bold rounded-3xl p-3 mt-2">Załóż konto</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-full sm:w-1/3 border-4 border-zinc-800 rounded-3xl py-8 sm:my-0 my-10">
            <div class="w-full text-4xl font-bold mb-7 text-center">
                Nowy klient
            </div>
            <div class="w-full text-2xl font-bold text-center">
                Załóż konto i ciesz się następującymi korzyściami:
            </div>
            <div class="flex justify-center">
                <ul class="list-none mt-6 text-2xl items-start">
                    <li class="my-7 font-bold"><i class="fa-solid fa-check fa-2xl me-3" style="color: #3ccd3f;"></i>
                        Szybki proces zamawiania
                    </li>
                    <li class="my-7 font-bold"><i class="fa-solid fa-check fa-2xl me-3" style="color: #3ccd3f;"></i>
                        Pełna historia wszystkich zamówień
                    </li>
                    <li class="my-7 font-bold"><i class="fa-solid fa-check fa-2xl me-3" style="color: #3ccd3f;"></i>
                        Specjalne kody rabatowe
                    </li>
                    <li class="my-7 font-bold"><i class="fa-solid fa-check fa-2xl me-3" style="color: #3ccd3f;"></i>
                        Dostęp do unikalnych promocji
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
