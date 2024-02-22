@extends('layout.admin')
@section('side_bar')
    @include('includes.adminEmployeesNavbar')
@endsection
@section('content')
    <div class="w-full flex justify-center items-start min-h-screen py-10">
        <div class="w-full flex justify-center items-start min-h-screen">
            <div class="w-1/2 border-4 rounded-3xl p-4 my-5">
                <div class="text-center text-2xl font-bold mb-10">
                    Dodawanie pracownika
                </div>
                <div class="flex justify-center">
                    <form method="post" action="{{ route('employees.store') }}" class="w-1/2">
                        @csrf
                        <div class="form-group my-3">
                            <select name="position"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required
                            >
                                <option selected disabled>Stanowisko</option>
                                <option value="shop_worker">Pracownik sklepu</option>
                                <option value="warehouse_worker">Pracownik magazynu</option>
                                <option value="shop_manager">Kierownik sklepu</option>
                            </select>
                            @if($errors->first('position'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('position'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group my-3">
                            <input type="text"
                                   name="first_name"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   placeholder="Imię">
                            @if($errors->first('first_name'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('first_name'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group my-3">
                            <input type="text"
                                   name="last_name"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   placeholder="Nazwisko">
                            @if($errors->first('last_name'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('last_name'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group my-3">
                            <input type="email"
                                   name="email"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   placeholder="Email">
                            @if($errors->first('email'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('email'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group my-3">
                            <input type="password"
                                   name="password"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   placeholder="Hasło tymczasowe">
                            @if($errors->first('password'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('password'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group my-3">
                            <input type="password"
                                   name="password_confirmation"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   placeholder="Potwierdzenie hasła">
                            @if($errors->first('password_confirmation'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('password_confirmation'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group my-3">
                            <input type="text"
                                   name="phone_number"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   placeholder="Numer telefonu">
                            @if($errors->first('phone_number'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('phone_number'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group my-3">
                            <input type="text"
                                   name="street"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   placeholder="Ulica">
                            @if($errors->first('street'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('street'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group my-3">
                            <input type="text"
                                   name="city"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   placeholder="Miasto">
                            @if($errors->first('city'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('city'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group my-3">
                            <input type="text"
                                   name="postal_code"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   placeholder="Kod pocztowy">
                            @if($errors->first('postal_code'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('postal_code'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group my-3">
                            <select type="text"
                                    name="provinces_id"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            >
                                <option selected disabled>Województwo</option>
                                @foreach($provinces as $province)
                                    <option value="{{$province['id']}}">{{$province['name']}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('provinces'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('provinces'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group my-3">
                            <select name="store_id"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            >
                                <option selected disabled>Jeżeli pracownik sklepu wybierz sklep</option>
                                @foreach($stores as $store)
                                    <option value="{{$store['id']}}">{{$store['name']}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('shop_id'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('shop_id'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group my-3">
                            <select type="text"
                                    name="warehouse_id"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            >
                                <option selected disabled>Jeżeli pracownik magazynu wybierz magazyn</option>
                                @foreach($warehouses as $warehouse)
                                    <option value="{{$warehouse['id']}}">{{$warehouse['name']}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('shop_id'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('$warehouse_id'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group my-3 text-center">
                            <button type="submit"
                                    class="btn bg-yellow-400 text-2xl font-bold rounded-3xl p-3 mt-2"
                            >
                                Dodaj pracownika
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
