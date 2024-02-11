@extends('layout.admin')
@section('side_bar')
    @include('includes.adminProductsNavbar')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="container col-6 product-search">
                    <input class="form-control" type="text" id="search" placeholder="Wyszukaj...">
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col" class="sort" data-sort="id">#</th>
                        <th scope="col" class="sort" data-sort="name">Nazwa</th>
                        <th scope="col" class="sort" data-sort="description">Opis</th>
                        <th scope="col" class="sort" data-sort="price">Cena</th>
                        <th scope="col" class="sort" data-sort="category_id">Kategoria</th>
                        <th scope="col" class="sort" data-sort="brand_id">Marka</th>
                        <th scope="col">Akcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($viewData['products'] as $product)
                        <tr>
                            <th scope="row">{{ ($viewData['products']->currentPage()-1) * $viewData['products']->perPage() + $loop->iteration }}</th>
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
                                   title="Edytuj"><i class="fa-solid fa-pen-to-square fa-xl main-icon"></i></a>
                                <div style="display: inline-block;">
                                    <form action="/admin/produkty/zarchiwizuj/{{$product['id']}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn" title="Zarchwizuj">
                                            <i class="fa-solid fa-box-archive fa-xl main-icon"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="container col-12 padding">
                    {{ $viewData['products']->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('.sort').on('click', function() {
            var column = $(this).data('sort');
            $.ajax({
                url: '/admin/produkty',
                type: 'get',
                data: { column: column },
                success: function(response) {
                    $('body').html(response);
                }
            });
        });
    });

    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var query = $(this).val();
            $.ajax({
                url: '/admin/produkty/wyszukaj',
                type: 'get',
                data: { query: query },
                success: function(response) {
                    $('body').html(response);
                    $('#search').val(query);
                }
            });
        });
    });
</script>

