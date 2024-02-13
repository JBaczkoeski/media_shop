@extends('layout.user')
@section('content')
    <div class="container-fluid product">
        <div class="row">
            <div class="container col-2 pt-3">
                <div class="container col-12 product-info">
                    {{$viewData['category']['name'] ?? 'Wszystkie produkty'}} @if(isset($viewData['products']))({{$viewData['products']->total()}})@endif
                </div>
                <hr>
                <div class="container">
                    <form method="GET" class="text-center">
                        <div class="form-group my-3">
                            <label class="filter" for="category">Sortowanie</label>
                            <select class="form-control" name="sort" id="sort">
                                <option selected disabled>Sortowanie produktów</option>
                                <option value="asc">Cena rosnąco</option>
                                <option value="desc">Cena malejąco</option>
                            </select>
                        </div>
                        <div class="form-group my-3">
                            <label class="filter" for="category">Kategoria</label>
                            <select class="form-control" name="category" id="category">
                                <option disabled selected>Kategoria</option>
                                @foreach($viewData['categories'] as $category)
                                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-3">
                            <label class="filter" for="brand">Marka</label>
                            <select class="form-control" name="brand" id="brand">
                                <option disabled selected>Marka</option>
                            @foreach($viewData['brands'] as $brand)
                                    <option value="{{$brand['id']}}">{{$brand['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-3">
                            <label class="filter" for="price">Cena</label>
                            <input type="number" value="{{ $viewData['min_price'] ?? '' }}" class="form-control my-2" name="min_price" id="min_price" placeholder="Od">
                            <input type="number" value="{{ $viewData['max_price'] ?? '' }}" class="form-control" name="max_price" id="max_price" placeholder="Do">
                        </div>
                        <button type="submit" class="btn filter-button">Sortuj</button>
                    </form>
                </div>
            </div>

            <div class="container col-9">
                <div class="container col-12">
                    <div class="row">
                        @foreach($viewData['products'] as $product)
                            <div class="container col-12 products">
                                <div class="row">
                                    <div class="container col-12 title">
                                        {{ $product['name'] }}
                                    </div>
                                    <div class="container col-4">
                                        <img class="image" src="{{Storage::url($product['image_src'])}}"
                                             alt="produkt">
                                    </div>
                                    <div class="container col-4 description">
                                        {{ $product['description'] }}
                                    </div>
                                    <div class="container col-3">
                                        <p class="text-center price">{{ $product['price'] }}</p>
                                        <hr>
                                        <p class="information">Dostępność online: Dostępny</p>
                                        <p class="information">Stacjonarnie: Wybierz sklep</p>
                                        <p class="information">Czas wysyłki: 1-2 dni robocze</p>
                                        <hr>
                                        <a href="#" class="btn show-button">Sprawdź produkt</a>
                                        <form method="post" action="/koszyk/dodaj/{{$product['id']}}">
                                            @csrf
                                        <button class="btn add-cart">Dodaj do koszyka</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $viewData['products']->appends(['sort' => request()->sort, 'category' => request()->category, 'min_price' => request()->min_price, 'max_price' => request()->max_price])->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#category, #brand, #min_price, #max_price, #sort').change(function() {
                $('form[name="filterForm"]').find('select[name="sort"]').val($('#sort').val());

                this.form.submit();
            });
        });
    </script>
@endsection
