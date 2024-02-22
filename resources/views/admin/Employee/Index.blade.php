@extends('layout.admin')
@section('side_bar')
    @include('includes.adminEmployeesNavbar')
@endsection
@section('content')
    <div class="w-full">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Imię</th>
                <th scope="col" class="px-6 py-3">Nazwisko</th>
                <th scope="col" class="px-6 py-3">E-mail</th>
                <th scope="col" class="px-6 py-3">Numer tel</th>
                <th scope="col" class="px-6 py-3">Województwo</th>
                <th scope="col" class="px-6 py-3">Adres</th>
                <th scope="col" class="px-6 py-3">Oddział</th>
                <th scope="col" class="px-6 py-3">Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employe)
                <tr class="bg-white text-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-6 py-4">{{ $employe['first_name'] }}</td>
                    <td class="px-6 py-4">{{ $employe['last_name'] }}</td>
                    <td class="px-6 py-4">{{ $employe['email'] }}</td>
                    <td class="px-6 py-4">{{ $employe['phone_number']}}</td>
                    <td class="px-6 py-4">{{ $employe['province']['name'] }}</td>
                    <td class="px-6 py-4">{{ $employe['city'] }}, {{ $employe['street'] }}
                        , {{ $employe['postal_code'] }}</td>
                    <td class="px-6 py-4">{{ $employe['store']['name'] ?? $employe['warehouse']['name'] }}</td>
                    <td class="px-6 py-4">
                        <form action="/admin/produkty/usun/{{$employe['id']}}" method="POST"
                              style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" title="Usuń">
                                <i class="fa-solid fa-trash fa-xl" style="color: #ff0000;"></i>
                            </button>
                        </form>
                        <a href="/admin/produkty/produkt/edytuj/{{$employe['id']}}" class="btn" title="Edytuj"><i
                                class="fa-solid fa-pen-to-square fa-xl" style="color: #EFB70A;"></i></a>
                        <div style="display: inline-block;">
                            <form action="/admin/produkty/zarchiwizuj/{{$employe['id']}}" method="POST">
                                @csrf
                                <button type="submit" class="btn" title="Zarchwizuj">
                                    <i class="fa-solid fa-box-archive fa-xl" style="color: #EFB70A;"></i>
                                </button>
                            </form>
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
