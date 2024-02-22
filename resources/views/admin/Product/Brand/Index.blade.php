@extends('layout.admin')
@section('side_bar')
    @include('includes.adminProductsNavbar')
@endsection
@section('content')
    <div class="container mx-auto px-6 py-8">
        <div class="flex flex-wrap -mx-2">
            <div class="w-full lg:w-1/2 px-2 mb-4">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">Nazwa</th>
                        <th scope="col" class="px-6 py-3">Akcje</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach($brands as $brand)
                        <tr>
                            <td scope="row" class="px-4 py-3">{{$loop->iteration}}</td>
                            <td class="px-4 py-3">{{ $brand['name'] }}</td>
                            <td class="px-4 py-3">
                                <a href="#" class="text-red-600 hover:text-red-900" title="Usuń"><i class="fa-solid fa-trash"></i></a>
                                <a href="#" class="main-icon" title="Edytuj"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#" class="main-icon" title="Zarchwizuj"><i class="fa-solid fa-box-archive"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="w-full lg:w-1/2 px-2">
                <div class="text-center text-2xl font-bold mb-10">
                    Dodaj markę
                </div>
                <form class="text-center" method="post" action="{{ route('brands.create') }}">
                    @csrf
                    <div class="mb-5">
                        <input class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               type="text"
                               name="name"
                               placeholder="Nazwa"
                        >
                    </div>
                    <div>
                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-black font-bold py-2 px-4 rounded">Dodaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
