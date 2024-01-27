@extends('layout.admin')
@section('side_bar')
    @include('includes.adminEmployeesNavbar')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12 mt-3">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imię</th>
                        <th scope="col">Nazwisko</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Numer tel</th>
                        <th scope="col">Województwo</th>
                        <th scope="col">Adres</th>
                        <th scope="col">Oddział</th>
                        <th scope="col">Akcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employe)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $employe['first_name'] }}</td>
                            <td>{{ $employe['last_name'] }}</td>
                            <td>{{ $employe['email'] }}</td>
                            <td>{{ $employe['phone_number']}}</td>
                            <td>{{ $employe['province']['name'] }}</td>
                            <td>{{ $employe['city'] }}, {{ $employe['street'] }}, {{ $employe['postal_code'] }}</td>
                            <td>{{ $employe['store']['name'] ?? $employe['warehouse']['name'] }}</td>
                            <td>
                                <form action="/admin/produkty/usun/{{$employe['id']}}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn" title="Usuń">
                                        <i class="fa-solid fa-trash fa-xl" style="color: #ff0000;"></i>
                                    </button>
                                </form>
                                <a href="/admin/produkty/produkt/edytuj/{{$employe['id']}}" class="btn" title="Edytuj"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #EFB70A;"></i></a>
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
