<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <script src="https://kit.fontawesome.com/1e48838dc2.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">

    <title>Elektroniczny Sklep</title>
</head>
<body>
<nav class="bg-zinc-800">
    <div class="mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button type="button"
                        class="ms-dropdown relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center text-2xl text-white">
                    <a href="/">
                        MEDIA SHOP
                    </a>
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="/produkty"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Produkty</a>
                    </div>
                </div>
            </div>
            @auth()
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative ml-3">
                        <div>
                            <button type="button"
                                    class="dropdown-button text-white rounded-md px-3 py-2 text-sm font-medium"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                Jakub
                            </button>
                        </div>
                        <div
                            class="dropdown-menu absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                               id="user-menu-item-0">Zamówienia</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                               id="user-menu-item-0">Moje dane</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                               id="user-menu-item-0">Opinie</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                               id="user-menu-item-1">Zwroty</a>
                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700"
                               role="menuitem" tabindex="-1"
                               id="user-menu-item-2"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Wyloguj
                                się</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                    <a href="/koszyk" class="relative bg-zinc-800 p-1 text-gray-400 hover:text-white">
                        <i class="fa-solid fa-cart-shopping fa-2xl main-icon"></i>
                    </a>
                </div>
            @endauth
            <div class="hidden sm:ml-6 sm:block">
                <div class="flex">
                    <a href="/logowanie"
                       class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Zaloguj
                        się</a>
                    <a href="/rejestracja"
                       class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Zarejestruj
                        się</a>
                </div>
            </div>
        </div>
    </div>
    <div class="sm:hidden mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <a href="#"
               class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">
                Produkty
            </a>
        </div>
        @guest()
            <div class="space-y-1 px-2 pb-3 pt-2">
                <a href="/logowanie"
                   class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">
                    Zaloguj się
                </a>
                <a href="/rejestracja"
                   class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">
                    Zarejestruj się
                </a>
            </div>
        @endguest
    </div>
</nav>
@if (Session::get('success') || Session::get('error'))
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
@endif
@yield('content')
<footer id="footer" class="bg-zinc-800 py-3 text-center footer-sticky text-white">
    <p>&copy; 2024 Elektroniczny Sklep. Wszelkie prawa zastrzeżone.</p>
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

    document.addEventListener('DOMContentLoaded', function () {
        var element = document.getElementById('footer');
        if (document.body.scrollHeight > window.innerHeight) {
            element.classList.add('static');
        }
    });
</script>
</body>
</html>
