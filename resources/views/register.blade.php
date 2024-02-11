@extends('layout.user')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="container col-6">
                <div class="row register justify-content-center">
                    <div class="container col-12 title">
                        Załóż konto
                    </div>
                    <form method="post" action="{{ route('register') }}" class="form-group col-7 row text-center">
                        @csrf
                        <div class="container my-4">
                            <input name="first_name" type="text" class="form-control" placeholder="Imię *" required>
                            @if($errors->first('first_name'))
                                <p class="text-danger">{{($errors->first('first_name'))}}</p>
                            @endif
                        </div>
                        <div class="container">
                            <input name="last_name" type="text" class="form-control" placeholder="Nazwisko *" required>
                            @if($errors->first('last_name'))
                                <p class="text-danger">{{($errors->first('last_name'))}}</p>
                            @endif
                        </div>
                        <div class="container my-4">
                            <input name="email" type="text" class="form-control" placeholder="E-mail *" required>
                            @if($errors->first('email'))
                                <p class="text-danger">{{($errors->first('email'))}}</p>
                            @endif

                        </div>
                        <div class="container">
                            <input name="password" type="password" class="form-control" placeholder="Hasło *" required>
                            @if($errors->first('password'))
                                <p class="text-danger">{{($errors->first('password'))}}</p>
                            @endif

                        </div>
                        <div class="container my-4">
                            <input name="password_confirmation" type="password" class="form-control" placeholder="Potwierdź hasło *" required>
                            @if($errors->first('password_confirmation'))
                                <p class="text-danger">{{($errors->first('password_confirmation'))}}</p>
                            @endif
                        </div>
                        <div class="container mb-5">
                            <button class="btn button">Załóż konto</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container col-6">
                <div class="row">
                    <div class="container col-12 ps-5 py-5">
                        <div class="container col-12 h2 text-center mt-5 pt-2">
                            Ciesz się następującymi korzyściami:
                        </div>
                        <ul class="list-group col-12 register-list">
                            <ol class="my-3 item">
                                <i class="fa-solid fa-check fa-2xl me-3" style="color: #3ccd3f;"></i>
                                Szybki proces zamawiania
                            </ol>
                            <ol class="my-2 item">
                                <i class="fa-solid fa-check fa-2xl me-3" style="color: #3ccd3f;"></i>
                                Pełna historia wszystkich zamówień
                            </ol>
                            <ol class="my-3 item">
                                <i class="fa-solid fa-check fa-2xl me-3" style="color: #3ccd3f;"></i>
                                Specjalne kody rabatowe
                            </ol>
                            <ol class="my-2 item">
                                <i class="fa-solid fa-check fa-2xl me-3" style="color: #3ccd3f;"></i>
                                Dostęp do unikalnych promocji
                            </ol>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
