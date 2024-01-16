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
    <title>Elektroniczny Sklep</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" style="color: #EFB70A">Elektroniczny Sklep</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Produkty
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Telewizory</a></li>
                        <li><a class="dropdown-item" href="#">Komputery</a></li>
                        <li><a class="dropdown-item" href="#">Telefony</a></li>
                        <li><a class="dropdown-item" href="#">Aparaty</a></li>
                        <li><a class="dropdown-item" href="#">Gry</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex input-group w-50 mx-auto">
                <input type="search" class="form-control" placeholder="Wyszukaj" aria-label="Search"/>
                <button class="btn btn-outline-warning" type="button">
                    Szukaj
                </button>
            </form>
            <ul class="navbar-nav ms-auto me-3">
                <li class="nav-item dropdown me-4">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink"
                       role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Konto
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Zamówienia</a></li>
                        <li><a class="dropdown-item" href="#">Moje dane</a></li>
                        <li><a class="dropdown-item" href="#">Opinie</a></li>
                        <li><a class="dropdown-item" href="#">Zwroty</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Zaloguj się</a></li>
                        <li><a class="dropdown-item" href="#">Zarejestruj się</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="btn"><i class="fa-solid fa-cart-shopping fa-2xl" style="color: #EFB70A;"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer class="footer mt-5 bg-dark text-white text-center py-3">
    <div class="container">
        <p>&copy; 2024 Elektroniczny Sklep. Wszelkie prawa zastrzeżone.</p>
    </div>
</footer>
</body>
</html>
