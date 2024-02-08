@extends('layout.admin')
@section('side_bar')
    @include('includes.adminProductsNavbar')
@endsection
@section('content')
    <div class="container-fluid mt-5">
        <div class="row d-flex justify-content-center">
            <div class="container col-7 border border-4">
                <div class="container col-12 h3 text-center my-3">
                    EDYTUJ PRODUKT
                </div>
                <form method="post" action="{{ route('product.update', ['product' => $product['id']]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" value="{{ $product['id'] }}">
                    <div class="form-group my-3">
                        <input type="text" value="{{ $product['name'] }}" name="name" class="form-control"
                               placeholder="Nazwa produktu">
                        @if($errors->first('name'))
                            <p class="text-danger">{{($errors->first('name'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <textarea name="description"
                                  class="form-control" placeholder="Opis">{{ $product['description'] }}</textarea>
                        @if($errors->first('description'))
                            <p class="text-danger">{{($errors->first('description'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <input type="number" value="{{ $product['price'] }}" name="price" class="form-control"
                               placeholder="Cena">
                        @if($errors->first('price'))
                            <p class="text-danger">{{($errors->first('price'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <select name="category_id" class="form-control">
                            <option value="{{ $product['category_id'] }}" selected>{{ $product['category']['name'] }}</option>
                            @foreach($categories as $category)
                                <option value="{{$category['id']}}">{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                        @if($errors->first('category_id'))
                            <p class="text-danger">{{($errors->first('category_id'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <select name="brand_id" class="form-control">
                            <option value="{{ $product['brand_id'] }}" selected>{{ $product['brand']['name'] }}</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand['id']}}">{{ $brand['name'] }}</option>
                            @endforeach
                        </select>
                        @if($errors->first('brand_id'))
                            <p class="text-danger">{{($errors->first('brand_id'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <img class="img-fluid" src="{{ asset('storage/' . $product['image_src'])}}" alt="zdjęcie produktu">
                        <input type="file" value="{{ $product['image_src'] }}" id="img" name="image_src" class="form-control mt-5">
                        <label class="form-label" for="img">
                            Zdjęcie produktu
                        </label>
                        @if($errors->first('image_src'))
                            <p class="text-danger">{{($errors->first('image_src'))}}</p>
                        @endif
                    </div>
                    <div class="form-group text-center my-3">
                        <button type="submit" class="btn btn-lg btn-warning">Edytuj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
