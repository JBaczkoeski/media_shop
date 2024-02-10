@extends('layout.user')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="container col-5 text-center">
                <div class="row justify-content-center login">
                    <div class="container col-12 title">
                        Logowanie
                    </div>
                    <form method="post" action="{{ route('login') }}" class="form-group col-7 row">
                        @csrf
                        <div class="container my-4">
                            <input name="email" type="text" class="form-control" placeholder="E-mail">
                            @if($errors->first('email'))
                                <p class="text-danger">{{($errors->first('email'))}}</p>
                            @endif
                        </div>
                        <div class="container">
                            <input name="password" type="password" class="form-control" placeholder="Hasło">
                            @if($errors->first('password'))
                                <p class="text-danger">{{($errors->first('password'))}}</p>
                            @endif
                        </div>
                        <div class="container text-start my-4">
                            <a href="#" class="link-primary btn">Zresetuj hasło</a>
                        </div>
                        <div class="container mt-3">
                            <button class="btn button">Zaloguj się</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container col-5">
                <div class="row justify-content-center login">
                    <div class="container col-12 information">
                        Nowy klient
                    </div>
                    <div class="container col-12 information-title">
                        Załóż konto i zyskaj dostęp do:
                    </div>
                    <ul class="list-group list">
                        <ol class="my-2 item"><i class="fa-solid fa-check fa-xl me-3" style="color: #007e00;"></i>Szybki proces zamawiania</ol>
                        <ol class="my-2 item"><i class="fa-solid fa-check fa-xl me-3" style="color: #007e00;"></i>Pełna historia wszystkich zamówień</ol>
                        <ol class="my-2 item"><i class="fa-solid fa-check fa-xl me-3" style="color: #007e00;"></i>Specjalne kody rabatowe</ol>
                        <ol class="my-2 item"><i class="fa-solid fa-check fa-xl me-3" style="color: #007e00;"></i>Dostęp do unikalnych promocji</ol>
                    </ul>
                    <div class="container text-center">
                        <a href="/rejestracja" class="btn register-button">Zarejestruj się</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
