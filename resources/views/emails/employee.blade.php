<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Potwierdzenie utworzenia konta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
        }
    </style>
</head>
<body>
<h1>Witamy w naszym zespole!</h1>

<p>Szanowny {{ $user['first_name'] }},</p>

<p>Dziękujemy za dołączenie do naszego zespołu. Twoje konto pracownika zostało pomyślnie utworzone. Poniżej znajdują się szczegóły Twojego konta:</p>

<table>
    <thead>
    <tr>
        <th>Imię i nazwisko</th>
        <th>Email</th>
        <th>Hasło jednorazowe</th>
        <th>Data utworzenia</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td scope="col">{{ $user['first_name'] }} {{ $user['last_name'] }}</td>
        <td scope="col">{{ $user['email'] }}</td>
        <td scope="col">{{ $user['password'] }}</td>
        <td scope="col">{{ $user['created_at'] }}</td>
    </tr>
    </tbody>
</table>

<p>Twoje hasło jest jednorazowe. Po pierwszym logowaniu będziesz musiał je zmienić.</p>

<p>Jeśli masz jakiekolwiek pytania lub potrzebujesz pomocy, skontaktuj się z nami.</p>

<p>Z poważaniem,</p>
<p>Zespół Media Shop</p>
</body>
</html>
