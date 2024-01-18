@extends('layout.user')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="container col-3 pt-3">
                <div class="container col-12 h4">
                    LAPTOPY (189)
                </div>
                <hr>
                <div class="container">
                    ELEMENTY SORTOWANIA DO ZROBIENIA JAK JUŻ BĘDĄ REALNE PRODUKTY
                </div>
            </div>
            <div class="container col-8">
                <div class="container col-12 h5">
                    SELEKT Z SORTOWANIEM
                </div>
                <hr>
                <div class="container col-12">
                    <div class="row">
                        @for($i = 0; $i<=5; $i++)
                        <div class="container col-12 border border-1 px-4 py-3 my-1">
                            <div class="row">
                                <div class="container col-12 h4 text-center">
                                    NAZWA PRODUKTU
                                </div>
                                <div class="container col-4">
                                    <img class="img-fluid" src="{{Storage::url('image/image_3.jpg')}}" alt="produkt">
                                </div>
                                <div class="container col-4 pt-5">
                                    <ul class="list-group">
                                        <ol>PROCESOR: SUKIENNIK</ol>
                                        <ol>PROCESOR: SUKIENNIK</ol>
                                        <ol>PROCESOR: SUKIENNIK</ol>
                                        <ol>PROCESOR: SUKIENNIK</ol>
                                        <ol>PROCESOR: SUKIENNIK</ol>
                                    </ul>
                                </div>
                                <div class="container col-3">
                                    <p class="text-center h1 text-danger">1299.00zł</p>
                                    <hr>
                                    <p>Dostępność: Dostępny</p>
                                    <p>Czas wysyłki: 1-2 dni robocze</p>
                                    <hr>
                                    <a href="#" class="btn btn-lg btn-warning">Dodaj do koszyka</a>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
