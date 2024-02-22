@extends('layout.admin')
@section('side_bar')
    @include('includes.adminStoresNavbar')
@endsection
@section('content')
    <div class="w-full flex justify-center items-start min-h-screen py-10">
        <div class="w-full flex justify-center items-start min-h-screen">
            <div class="w-1/2 border-4 rounded-3xl p-4 my-5">
                <div class="text-center text-2xl font-bold mb-10">
                    Dodawanie sklepu
                </div>
                <div class="flex justify-center">
                    <form method="post" action="{{ route('stores.store') }}" class="w-1/2">
                        @csrf
                        <div class="form-group my-3">
                            <input type="text"
                                   name="name"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   value="Media shop - "
                                   placeholder="Nazwa">
                            @if($errors->first('name'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('name'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group my-3">
                            <input type="text"
                                   name="address"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   placeholder="Adres">
                            @if($errors->first('address'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('address'))}}
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
                            <select type="text"
                                    name="province_id"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            >
                                <option selected disabled>Województwo</option>
                                @foreach($provinces as $province)
                                    <option value="{{$province['id']}}">{{$province['name']}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('province_id'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('province_id'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group my-3 text-center">
                            <button type="submit" class="btn bg-yellow-400 text-2xl font-bold rounded-3xl p-3 mt-2">Dodaj sklep</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
