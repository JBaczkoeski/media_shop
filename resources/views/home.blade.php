@extends('layout.user')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="container col-5">
                        <img class="img-fluid" src="{{Storage::url('image/image_1.jpg')}}" alt="zdjęcie">
                    </div>
                    <div class="container col-6 border border-3 border-dark">
                        <div class="row">
                            <div class="container col-6">
                                <div class="container col-12 bg-warning fw-bold h1 text-center">
                                    HIT DNIA !
                                </div>
                                <div class="container col-12">
                                    <img class="img-fluid" src="{{Storage::url('image/image_2.jpg')}}" alt="zdjęcie">
                                </div>
                            </div>
                            <div class="container col-6 pt-5">
                                <div class="container col-12 h5">
                                    Drukarka EPSON EcoTank M1100
                                </div>
                                <div class="container col-12 h1 text-danger mt-3">
                                    499.00 zł
                                </div>
                                <div class="container col-12 mt-3">
                                    <p>Cena przed obniżką: 699 zł</p>
                                    <p>Najniższa cena z ostatnich 30 dni: 799 zł</p>
                                </div>
                                <div class="container col-12 mt-3 text-center mt-5">
                                    <a href="#" class="btn btn-lg bg-warning fw-bold">SPRAWDŹ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
