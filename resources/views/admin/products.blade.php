@extends('layout.admin')
@section('side_bar')
    @include('includes.adminProductsNavbar')
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
                        <th scope="col">Opis</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Kategoria</th>
                        <th scope="col">Marka</th>
                        <th scope="col">Akcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{ ($products->currentPage()-1) * $products->perPage() + $loop->iteration }}</th>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['description'] }}</td>
                            <td>{{ $product['price'] }}</td>
                            <td>{{ $product['category']['name'] }}</td>
                            <td>{{ $product['brand']['name'] }}</td>
                            <td>
                                <form action="/admin/produkty/usun/{{$product['id']}}" method="POST"
                                      style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn" title="Usuń">
                                        <i class="fa-solid fa-trash fa-xl" style="color: #ff0000;"></i>
                                    </button>
                                </form>
                                <a href="/admin/produkty/produkt/edytuj/{{$product['id']}}" class="btn"
                                   title="Edytuj"><i class="fa-solid fa-pen-to-square fa-xl"
                                                     style="color: #EFB70A;"></i></a>
                                <div style="display: inline-block;">
                                    <form action="/admin/produkty/zarchiwizuj/{{$product['id']}}" method="POST">
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
                <div class="container col-6">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
