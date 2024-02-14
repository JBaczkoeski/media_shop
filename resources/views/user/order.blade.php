@extends('layout.user')
@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center mt-5">
            <div class="container col-12 mb-3 h2">
                Zamówienia
            </div>
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col" class="sort" data-sort="id">#</th>
                        <th scope="col" class="sort" data-sort="name">Numer seryjny</th>
                        <th scope="col" class="sort" data-sort="description">Cena</th>
                        <th scope="col" class="sort" data-sort="price">Status</th>
                        <th scope="col" class="sort" data-sort="category_id">Data złożenia zamówienia</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $order['serial_number'] }}</td>
                            <td>{{ $order['total_price'] }}</td>
                            <td>{{ $order['status'] }}</td>
                            <td>{{ $order['created_at'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="container col-12 padding">
                    {{ $orders->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
