<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Potwierdzenie zamówienia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .sum{
            text-align: end;
            font-weight: bold;
            font-size: 24px;
            margin-right: 5%;
        }
    </style>
</head>
<body>
<h1>Dziękujemy za zamówienie!</h1>

<p>Szanowny {{ $user->first_name }},</p>

<p>Dziękujemy za złożenie zamówienia o numerze <strong>{{$order_info->serial_number}}</strong> ,które aktualnie jest na etapie <strong>{{$order_info->status}}</strong>. Poniżej znajdują się szczegóły Twojego zamówienia:</p>

<table>
    <thead>
    <tr>
        <th>Produkt</th>
        <th>Ilość</th>
        <th>Cena</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($order['buy_products'] as $item)
        <tr>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['quantity'] }}</td>
            <td>{{ $item['unit_amount']['value'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<p class="sum">Łączna kwota do zapłaty: {{ $order['cart_sum'] }}</p>

<p>Dziękujemy za zakupy w naszym sklepie!</p>

<p>Z poważaniem,</p>
<p>Zespół media shop</p>
</body>
</html>
