@extends('layout.admin')
@section('side_bar')
    @include('includes.adminProductsNavbar')
@endsection
@section('content')
    <div class="w-full">
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
            @foreach($products as $product)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        >
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-6 py-4">{{ $product['name'] }}</td>
                    <td class="px-6 py-4">{{ $product['description'] }}</td>
                    <td class="px-6 py-4">{{ $product['price'] }}</td>
                    <td class="px-6 py-4">{{ $product['quantity_in_stock'] }}</td>
                    <td class="px-6 py-4">{{ $product['category']['name'] }}</td>
                    <td class="px-6 py-4">{{ $product['brand']['name'] }}</td>
                    <td class="px-6 py-4">
                        <form action="/admin/produkty/usun/{{$product['id']}}" method="POST"
                              style="display: inline-block;"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" title="Usuń">
                                <i class="fa-solid fa-trash fa-xl text-red-500" style="color: #ff0000;"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
    </div>
@endsection
