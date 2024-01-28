@extends('layout.admin')
@section('side_bar')
    @include('includes.adminWarehousesNavbar')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12 mt-3">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Adres</th>
                        <th scope="col">Miasto</th>
                        <th scope="col">Województwo</th>
                        <th scope="col">Akcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($warehouses as $warehouse)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $warehouse['name'] }}</td>
                            <td>{{ $warehouse['address'] }}</td>
                            <td>{{ $warehouse['city'] }}</td>
                            <td>{{ $warehouse['province']['name'] }}</td>
                            <td>
                                <form action="/admin/produkty/usun/{{$warehouse['id']}}" method="POST"
                                      style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn" title="Usuń">
                                        <i class="fa-solid fa-trash fa-xl" style="color: #ff0000;"></i>
                                    </button>
                                </form>
                                <a href="/admin/produkty/produkt/edytuj/{{$warehouse['id']}}" class="btn"
                                   title="Edytuj"><i class="fa-solid fa-pen-to-square fa-xl"
                                                     style="color: #EFB70A;"></i></a>
                                <div style="display: inline-block;">
                                    <a href="/admin/sklep/{{$warehouse['id']}}" title="Podgląd">
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
