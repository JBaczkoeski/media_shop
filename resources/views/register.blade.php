@extends('layout.user')
@section('content')
    <div class="container col-10 mt-5">
        <div class="row d-flex justify-content-center">
            <div class="container col-6">
                <div class="row border pb-3 border-2 d-flex justify-content-center">
                    <div class="container col-12 mt-5 pt-4 h3 text-center">
                        Załóż konto
                    </div>
                    <form class="form-group col-7 row text-center">
                        <div class="container my-4">
                            <input type="text" class="form-control" placeholder="Imię">
                        </div>
                        <div class="container">
                            <input type="text" class="form-control" placeholder="Nazwisko">
                        </div>
                        <div class="container my-4">
                            <input type="text" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="container">
                            <input type="password" class="form-control" placeholder="Hasło">
                        </div>
                        <div class="container my-5">
                            <button class="btn btn-lg btn-warning">Załóż konto</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container col-6">
                <div class="row">
                    <div class="container col-12 ps-5 border border-2 py-5">
                        <div class="container col-12 h2 text-center mt-5 pt-2">
                            Ciesz się następującymi korzyściami:
                        </div>
                        <ul class="list-group text-start col-12 my-5 ms-5">
                            <ol class="my-3 fw-bold"><i class="fa-solid fa-check fa-2xl me-3" style="color: #3ccd3f;"></i>Szybki proces zamawiania</ol>
                            <ol class="my-2 fw-bold"><i class="fa-solid fa-check fa-2xl me-3" style="color: #3ccd3f;"></i>Pełna historia wszystkich zamówień</ol>
                            <ol class="my-3 fw-bold"><i class="fa-solid fa-check fa-2xl me-3" style="color: #3ccd3f;"></i>Specjalne kody rabatowe</ol>
                            <ol class="my-2 fw-bold"><i class="fa-solid fa-check fa-2xl me-3" style="color: #3ccd3f;"></i>Dostęp do unikalnych promocji</ol>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
