@extends('layout.admin')
@section('side_bar')
    @include('includes.adminProductsNavbar')
@endsection
@section('content')
    <div class="w-full py-5">
        <div class="w-full text-center mb-5">
            <input
                class="px-3 w-1/2 border-2 rounded-2xl bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                type="text"
                id="search"
                placeholder="Wyszukaj...">
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3" data-sort="id">#</th>
                <th scope="col" class="px-6 py-3" data-sort="name">Nazwa</th>
                <th scope="col" class="px-6 py-3" data-sort="description">Opis</th>
                <th scope="col" class="px-6 py-3" data-sort="price">Cena</th>
                <th scope="col" class="px-6 py-3" data-sort="category_id">Kategoria</th>
                <th scope="col" class="px-6 py-3" data-sort="brand_id">Marka</th>
                <th scope="col" class="px-6 py-3">Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($viewData['products'] as $product)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ ($viewData['products']->currentPage()-1) * $viewData['products']->perPage() + $loop->iteration }}
                    </th>
                    <td class="px-6 py-4">{{ $product['name'] }}</td>
                    <td class="px-6 py-4">{{ $product['description'] }}</td>
                    <td class="px-6 py-4">{{ $product['price'] }}</td>
                    <td class="px-6 py-4">{{ $product['category']['name'] }}</td>
                    <td class="px-6 py-4">{{ $product['brand']['name'] }}</td>
                    <td class="px-6 py-4">
                        <form action="/admin/produkty/usun/{{$product['id']}}" method="POST"
                              class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" title="Usuń">
                                <i class="fa-solid fa-trash fa-xl text-red-500"></i>
                            </button>
                        </form>
                        <a href="/admin/produkty/edytuj/{{$product['id']}}" class="btn"
                           title="Edytuj"><i class="fa-solid fa-pen-to-square fa-xl text-blue-500 mx-3"></i></a>
                        <div class="inline-block">
                            <form action="/admin/produkty/zarchiwizuj/{{$product['id']}}" method="POST">
                                @csrf
                                <button type="submit" class="btn" title="Zarchwizuj">
                                    <i class="fa-solid fa-box-archive fa-xl text-green-500"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="container col-12 py-4">
            {{ $viewData['products']->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('.sort').on('click', function () {
            var column = $(this).data('sort');
            $.ajax({
                url: '/admin/produkty',
                type: 'get',
                data: {column: column},
                success: function (response) {
                    $('body').html(response);
                }
            });
        });
    });

    $(document).ready(function () {
        $('#search').on('keyup', function () {
            var query = $(this).val();
            $.ajax({
                url: '/admin/produkty/wyszukaj',
                type: 'get',
                data: {query: query},
                success: function (response) {
                    $('body').html(response);
                    $('#search').val(query);
                }
            });
        });
    });
</script>

