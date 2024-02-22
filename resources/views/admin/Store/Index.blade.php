@extends('layout.admin')
@section('side_bar')
    @include('includes.adminStoresNavbar')
@endsection
@section('content')
    <div class="w-full">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-4">#</th>
                <th scope="col" class="px-6 py-4">Nazwa</th>
                <th scope="col" class="px-6 py-4">Adres</th>
                <th scope="col" class="px-6 py-4">Miasto</th>
                <th scope="col" class="px-6 py-4">Województwo</th>
                <th scope="col" class="px-6 py-4">Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($stores as $store)
                <tr class="bg-white text-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</th>
                    <td class="px-6 py-4">{{ $store['name'] }}</td>
                    <td class="px-6 py-4">{{ $store['address'] }}</td>
                    <td class="px-6 py-4">{{ $store['city'] }}</td>
                    <td class="px-6 py-4">{{ $store['province']['name'] }}</td>
                    <td class="px-6 py-4">
                        <form action="/admin/produkty/usun/{{$store['id']}}" method="POST"
                              style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" title="Usuń">
                                <i class="fa-solid fa-trash fa-xl" style="color: #ff0000;"></i>
                            </button>
                        </form>
                        <a href="/admin/produkty/produkt/edytuj/{{$store['id']}}" class="btn"
                           title="Edytuj"><i class="fa-solid fa-pen-to-square fa-xl"
                                             style="color: #EFB70A;"></i></a>
                        <div style="display: inline-block;">
                            <a href="/admin/sklepy/sklep/{{$store['id']}}" title="Podgląd">
                                <i class="fa-solid fa-magnifying-glass fa-2xl" style="color: #EFB70A;"></i>
                            </a>
                        </div>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
    </div>
@endsection
