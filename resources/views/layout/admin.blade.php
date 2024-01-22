<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1e48838dc2.js" crossorigin="anonymous"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Elektroniczny Sklep</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="/" style="color: #EFB70A">Administrator</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-5">
                <li><a class="nav-link text-white btn" href="/admin/produkty">Produkty</a></li>
                <li><a class="nav-link text-white btn" href="/admin/uzytkonicy">Regiony</a></li>
                <li><a class="nav-link text-white btn" href="/admin/pracownicy">Pracownicy</a></li>
                <li><a class="nav-link text-white btn" href="#">Magazyn</a></li>
                <li><a class="nav-link text-white btn" href="#">Sklepy</a></li>
                <li><a class="nav-link text-white btn" href="#">Dostawy</a></li>
            </ul>
            <ul class="navbar-nav ms-auto me-3">
                @auth()
                    <li class="nav-item dropdown me-4">
                    <li><a class="nav-link btn text-white" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Wyloguj</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth
            </ul>
        </div>
    </div>
</nav>
@yield('side_bar')

@yield('content')

<footer class="footer mt-5 bg-dark text-white text-center py-3">
    <div class="container">
        <p>&copy; 2024 Elektroniczny Sklep. Wszelkie prawa zastrzeżone.</p>
    </div>
</footer>
</body>
</html>
