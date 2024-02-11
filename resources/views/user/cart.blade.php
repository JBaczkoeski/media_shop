@extends('layout.user')
@section('content')
    <div class="container cart">
        <h2 class="title">Twój koszyk</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nazwa produktu</th>
                <th>Cena</th>
                <th>ilość</th>
                <th>Suma</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cart_products as $product)
                <tr>
                    <td>{{ $product['product_detail']->name }}</td>
                    <td>{{ $product['product_detail']->price }}</td>
                    <td>{{ $product['quantity'] }}</td>
                    <td>{{ $product['quantity'] * $product['product_detail']->price }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <h4 class="sum">Łączna kwota: {{ $total }}</h4>
        </div>
        <div class="d-flex justify-content-end my-5">
            <a href="/checkout" class="btn button">Przejdź do kasy</a>
        </div>
        <h3 class="delivery-title">Opcje dostawy</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Metoda dostawy</th>
                <th>Cena</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Kurier</td>
                <td>20 zł</td>
            </tr>
            <tr>
                <td>Paczkomat</td>
                <td>15 zł</td>
            </tr>
            <tr>
                <td>Za pobraniem</td>
                <td>25 zł</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
