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

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">

    <title>Elektroniczny Sklep</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-color text-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="/" style="color: #EFB70A">Elektroniczny Sklep</a>
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
                        <li><a class="dropdown-item" href="/produkty">Wszystkie</a></li>
                        @foreach(\App\Models\Category::all() as $category)
                            <li><a class="dropdown-item sort" data-sort="{{$category['id']}}">{{$category['name']}}</a></li>

                        @endforeach
                    </ul>
                </li>
            </ul>
            <form method="get" action=" {{ route('user.products.search') }}" class="d-flex input-group w-50 mx-auto">
                @csrf
                <input name="query" type="search" class="form-control" placeholder="Wyszukaj" aria-label="Search"/>
                <button class="btn btn-outline-warning" type="submit">
                    Szukaj
                </button>
            </form>
            <ul class="navbar-nav ms-auto me-3">
                @auth()
                    <li class="nav-item dropdown me-4">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Konto
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/zamowienia">Zamówienia</a></li>
                            <li><a class="dropdown-item" href="#">Moje dane</a></li>
                            <li><a class="dropdown-item" href="#">Opinie</a></li>
                            <li><a class="dropdown-item" href="#">Zwroty</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Wyloguj</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @endauth
                @guest()
                    <li class="nav-item d-flex align-items-center me-4">
                        <a class="btn nav-link me-2 text-white" href="/logowanie">Zaloguj się</a>
                        <a class="btn nav-link text-white" href="/rejestracja">Zarejestruj się</a>
                    </li>
                @endguest
                <li class="nav-item">
                    <a href="/koszyk" class="btn"><i class="fa-solid fa-cart-shopping fa-2xl main-icon"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="d-flex justify-content-end">
    @if ($message = Session::get('success'))
        <div class="alert col-3 alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert col-3 alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
@yield('content')
<footer id="myElement" class="footer navbar-color py-3 text-center footer-sticky text-white">
    <div class="container">
        <p>&copy; 2024 Elektroniczny Sklep. Wszelkie prawa zastrzeżone.</p>
    </div>
</footer>
<script>
    $(document).on('click', '.sort', function () {
        var category = $(this).data('sort');
        $.ajax({
            url: '/produkty',
            type: 'get',
            data: {category: category},
            success: function (response) {
                $('body').html(response);
                history.pushState(null, '', '/produkty?category=' + category);
                location.reload();
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var element = document.getElementById('myElement');
        if (document.body.scrollHeight > window.innerHeight) {
            element.classList.add('static');
        }
    });
</script>
</body>
</html>
