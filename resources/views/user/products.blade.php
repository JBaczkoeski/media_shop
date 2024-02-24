@extends('layout.user')
@section('content')
    <div class="flex flex-wrap py-5">
        <div class="w-1/6">
            <div class="w-full ps-4">
                {{$viewData['category']['name'] ?? 'Wszystkie produkty'}} @if(isset($viewData['products']))
                    ({{$viewData['products']->total()}})
                @endif
            </div>
            <hr>
            <div class="w-full">
                <form method="GET" class="text-center px-10">
                    <div class="my-3">
                        <label class="w-full" for="category">Sortowanie</label>
                        <select
                            class="px-5 w-full block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                            name="sort" id="sort">
                            <option selected disabled>Sortowanie produktów</option>
                            <option value="asc">Cena rosnąco</option>
                            <option value="desc">Cena malejąco</option>
                        </select>
                    </div>
                    <div class="my-3">
                        <label class="w-full" for="category">Kategoria</label>
                        <select
                            class="px-5 w-full block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                            name="category" id="category">
                            <option disabled selected>Kategoria</option>
                            @foreach($viewData['categories'] as $category)
                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-3">
                        <label class="w-full" for="brand">Marka</label>
                        <select
                            class="px-5 w-full block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                            name="brand" id="brand">
                            <option disabled selected>Marka</option>
                            @foreach($viewData['brands'] as $brand)
                                <option value="{{$brand['id']}}">{{$brand['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-3">
                        <label class="filter" for="price">Cena</label>
                        <input type="number" value="{{ $viewData['min_price'] ?? '' }}"
                               class="px-5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 my-2"
                               name="min_price" id="min_price" placeholder="Od">
                        <input type="number" value="{{ $viewData['max_price'] ?? '' }}"
                               class="px-5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                               name="max_price" id="max_price" placeholder="Do">
                    </div>
                    <button type="submit" class="bg-cyan-800 text-white font-bold py-2 px-7 rounded-3xl text-2xl">
                        Sortuj
                    </button>
                </form>
            </div>
        </div>
        <div class="w-5/6 px-20">
            <div class="w-full">
                <div class="flex flex-wrap">
                    @foreach($viewData['products'] as $product)
                        <div class="w-full border-2 rounded-3xl my-4 p-5">
                            <div class="flex">
                                <div class="w-1/3">
                                    <img src="{{ asset('storage/products/' . $product['image_src']) }}" alt="produkt">
                                </div>
                                <div class="w-2/3 pl-4">
                                    <div class="text-2xl font-bold">
                                        {{ $product['name'] }}
                                    </div>
                                    <div class="my-5 text-red-700 text-5xl font-bold text-end mt-5 pe-10 underline underline-offset-1">
                                        {{ $product['price'] }}
                                    </div>
                                    <div class="my-10 w-2/3 text-sm">
                                        {!! $product['description'] !!}
                                    </div>
                                    <div class="my-5 text-end">
                                        <hr class="my-2">
                                        <p class="text-xl">Dostępność online: Dostępny</p>
                                        <p class="text-xl">Stacjonarnie: Wybierz sklep</p>
                                        <p class="text-xl">Czas wysyłki: 1-2 dni robocze</p>
                                        <hr class="my-2">
                                        <div class="my-5 flex justify-end items-center">
                                            <a href="#" class="bg-yellow-400 text-2xl font-bold rounded-3xl py-3 px-9 uppercase me-3">Sprawdź</a>
                                            <form method="post" action="/koszyk/dodaj/{{$product['id']}}">
                                                @csrf
                                                <button class="bg-emerald-400 text-2xl font-bold rounded-3xl py-3 px-5 uppercase">Do koszyka</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="mx-auto justify-center">
                        {{ $viewData['products']->appends(['sort' => request()->sort, 'category' => request()->category, 'min_price' => request()->min_price, 'max_price' => request()->max_price])->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#category, #brand, #min_price, #max_price, #sort').change(function () {
                $('form[name="filterForm"]').find('select[name="sort"]').val($('#sort').val());

                this.form.submit();
            });
        });
    </script>
@endsection
