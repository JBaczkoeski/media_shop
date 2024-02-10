@extends('layout.user')
@section('content')
    <div class="container-fluid mt-2 test">
        <div class="row">
            <div class="container-fluid mb-2">
                <div class="row">
                    <div class="container col-5">
                        <img class="promo-image" src="{{Storage::url('image/image_1.jpg')}}" alt="zdjęcie">
                    </div>
                    <div class="container col-6 promo-banner">
                        <div class="row">
                            <div class="container col-6">
                                <div class="container col-12 fw-bold h1 text-center title">
                                    HIT DNIA !
                                </div>
                                <div class="container col-12">
                                    <img class="promo-image" src="{{Storage::url('image/image_2.jpg')}}" alt="zdjęcie">
                                </div>
                            </div>
                            <div class="container col-6">
                                <div class="container col-12 promo-name">
                                    Drukarka EPSON EcoTank M1100
                                </div>
                                <div class="container col-12 promo-price">
                                    499.00 zł
                                </div>
                                <div class="container col-12 promo-information">
                                    <p>Cena przed obniżką: 699 zł</p>
                                    <p>Najniższa cena z ostatnich 30 dni: 799 zł</p>
                                </div>
                                <div class="container col-12 mt-3 text-center mt-5">
                                    <a href="#" class="btn promo-button">SPRAWDŹ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid mt-3 home-news">
                <div class="row">
                    <div class="container col-12 title">
                        Nowości dla Ciebie
                    </div>
                    <div class="container col-12 h3">
                        <div class="row">
                            @for($i = 1; $i <= 4; $i++)
                                <a href="#" class="btn container col-3">
                                    <div class="container col-10">
                                        <img class="image" src="{{Storage::url('image/image_3.jpg')}}"
                                             alt="zdjęcie">
                                    </div>
                                    <div class="container col-10 product-title">
                                        Laptop ACER Nitro 5 AN515-46 15.6" IPS 144Hz R5-6600H 16GB RAM 512GB SSD GeForce
                                        RTX3050 Windows 11 Home
                                    </div>
                                    <div class="container col-10 mt-3">
                                        OCENA
                                    </div>
                                    <div class="container col-10 price">
                                        499.00 zł
                                    </div>
                                </a>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
