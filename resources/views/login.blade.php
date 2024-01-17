@extends('layout.user')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="container col-5 ms-5 text-center pt-5 my-2">
                <div class="row py-5 d-flex justify-content-center mt-5 border border-3 rounded rounded-1 shadow">
                    <div class="container col-12 h2">
                        Logowanie
                    </div>
                    {{$errors}}
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
                            <a href="#" class="link-primary">Zresetuj hasło</a>
                        </div>
                        <div class="container mt-3">
                            <button class="btn btn-lg btn-warning">Zaloguj się</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container col-5 ms-5 text-center pt-5 my-2">
                <div class="row py-5 d-flex justify-content-center mt-5 border border-3 rounded rounded-1 shadow">
                    <div class="container col-12 h2">
                        Nowy klient
                    </div>
                    <div class="container col-12 h4">
                        Załóż konto i zyskaj dostęp do:
                    </div>
                    <ul class="list-group text-start col-7 ms-5">
                        <ol class="my-2"><i class="fa-solid fa-check fa-2xl me-3" style="color: #3ccd3f;"></i>Szybki proces zamawiania</ol>
                        <ol class="my-2"><i class="fa-solid fa-check fa-2xl me-3" style="color: #3ccd3f;"></i>Pełna historia wszystkich zamówień</ol>
                        <ol class="my-2"><i class="fa-solid fa-check fa-2xl me-3" style="color: #3ccd3f;"></i>Specjalne kody rabatowe</ol>
                        <ol class="my-2"><i class="fa-solid fa-check fa-2xl me-3" style="color: #3ccd3f;"></i>Dostęp do unikalnych promocji</ol>
                    </ul>
                    <div class="container mt-2 mb-1">
                        <a href="/rejestracja" class="btn btn-lg btn-warning">Zarejestruj się</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
