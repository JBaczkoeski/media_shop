@extends('layout.user')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="container col-2 pt-3">
                <div class="container col-12 h5">
                    {{$viewData['category']['name'] ?? 'Wszystkie produkty'}} @if(isset($viewData['products']))({{$viewData['products']->total()}})@endif
                </div>
                <hr>
                <div class="container">
                    <form method="GET" class="text-center">
                        <div class="form-group my-3">
                            <label for="category">Sortowanie</label>
                            <select class="form-control" name="sort" id="sort">
                                <option selected disabled>Sortowanie produktów</option>
                                <option value="asc">Cena rosnąco</option>
                                <option value="desc">Cena malejąco</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group my-3">
                            <label for="category">Kategoria</label>
                            <select class="form-control" name="category" id="category">
                                <option disabled selected>Kategoria</option>
                                @foreach($viewData['categories'] as $category)
                                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-3">
                            <label for="brand">Marka</label>
                            <select class="form-control" name="brand" id="brand">
                                <option disabled selected>Marka</option>
                            @foreach($viewData['brands'] as $brand)
                                    <option value="{{$brand['id']}}">{{$brand['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-3">
                            <label for="price">Cena</label>
                            <input type="number" value="{{ $viewData['min_price'] ?? '' }}" class="form-control my-2" name="min_price" id="min_price" placeholder="Od">
                            <input type="number" value="{{ $viewData['max_price'] ?? '' }}" class="form-control" name="max_price" id="max_price" placeholder="Do">
                        </div>
                        <button type="submit" class="btn btn-primary">Sortuj</button>
                    </form>
                </div>
            </div>
            <div class="container col-9 pt-2">
                <div class="container col-12">
                    <div class="row">
                        @foreach($viewData['products'] as $product)
                            <div href="/produkty/produkt" class="container col-12 border border-1 px-4 py-3 my-1">
                                <div class="row">
                                    <div class="container col-12 h4 text-center">
                                        {{ $product['name'] }}
                                    </div>
                                    <div class="container col-4">
                                        <img class="img-fluid" src="{{Storage::url($product['image_src'])}}"
                                             alt="produkt">
                                    </div>
                                    <div class="container col-4 pt-5">
                                        {{ $product['description'] }}
                                    </div>
                                    <div class="container col-3">
                                        <p class="text-center h1 text-danger">{{ $product['price'] }}</p>
                                        <hr>
                                        <p>Dostępność online: Dostępny</p>
                                        <p>Stacjonarnie: Wybierz sklep</p>
                                        <p>Czas wysyłki: 1-2 dni robocze</p>
                                        <hr>
                                        <a href="#" class="btn btn-lg btn-success my-3">Sprawdź produkt</a>
                                        <form method="post" action="/koszyk/dodaj/{{$product['id']}}">
                                            @csrf
                                        <button class="btn btn-lg btn-warning">Dodaj do koszyka</button>
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
