@extends('layout.user')
@section('content')
    <div class="w-full mt-2 p-2">
        <div class="flex flex-wrap">
            <div class="mb-2">
                <div class="flex flex-wrap">
                    <div class="w-full sm:w-1/2 px-3 mb-4">
                        <img class="rounded-3xl shadow-2xl w-full" src="{{Storage::url('image/image_1.jpg')}}" alt="zdjęcie">
                    </div>
                    <div class="w-full sm:w-1/2 border-4 border-zinc-800 rounded-2xl pt-3 pb-5">
                        <div class="flex flex-wrap">
                            <div class="w-full sm:w-1/2">
                                <div class="text-center text-4xl bg-yellow-400 rounded-3xl font-bold">
                                    HIT DNIA !!
                                </div>
                                <div>
                                    <img src="{{Storage::url('image/image_2.jpg')}}" alt="zdjęcie">
                                </div>
                            </div>
                            <div class="w-full sm:w-1/2">
                                <div class="text-center text-3xl">
                                    Drukarka EPSON EcoTank M1100
                                </div>
                                <div class="text-red-700 text-5xl font-bold text-center mt-5">
                                    499.00 zł
                                </div>
                                <div class="mt-12 ps-10 text-lg">
                                    <p>Cena przed obniżką: 699 zł</p>
                                    <p>Najniższa cena z ostatnich 30 dni: 799 zł</p>
                                </div>
                                <div class="mt-14 text-center">
                                    <a href="#" class="bg-yellow-400 text-3xl font-bold rounded-3xl py-3 px-4">SPRAWDŹ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full mx-auto my-3">
                <div class="flex flex-wrap">
                    <div class="w-full text-3xl font-bold ps-5">
                        Nowości dla Ciebie
                    </div>
                    <div class="w-full">
                        <div class="flex flex-wrap justify-center py-2">
                            @for($i = 1; $i <= 5; $i++)
                                <a href="#" class="w-full sm:w-1/2 md:w-1/3 lg:w-1/6 mx-2">
                                    <div class="w-full mx-auto">
                                        <img class="w-full" src="{{Storage::url('image/image_3.jpg')}}" alt="zdjęcie">
                                    </div>
                                    <div class="w-10/12 mx-auto overflow-hidden whitespace-nowrap">
                                        Laptop ACER Nitro 5 AN515-46 15.6" IPS 144Hz R5-6600H 16GB RAM 512GB SSD GeForce
                                        RTX3050 Windows 11 Home
                                    </div>
                                    <div class="w-10/12 mx-auto my-3 ps-3 font-bold text-xl">
                                        OCENA
                                    </div>
                                    <div class="w-10/12 mx-auto text-red-700 font-bold text-3xl ps-3">
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
