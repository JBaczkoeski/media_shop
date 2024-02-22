@extends('layout.admin')
@section('side_bar')
    @include('includes.adminWarehousesNavbar')
@endsection
@section('content')
    <div class="w-full flex justify-center items-start min-h-screen py-10">
        <div class="w-full flex justify-center items-start min-h-screen">
            <div class="w-1/2 border-4 rounded-3xl p-4 my-5">
                <div class="text-center text-2xl font-bold mb-10">
                    DODAJ NOWY MAGAZYN
                </div>
                <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-3">
                        <input type="text" name="name" class="form-control" placeholder="Nazwa produktu">
                        @if($errors->first('name'))
                            <p class="text-danger">{{($errors->first('name'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <textarea type="text" name="description" class="form-control" placeholder="Opis"></textarea>
                        @if($errors->first('description'))
                            <p class="text-danger">{{($errors->first('description'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <input type="number" name="price" class="form-control" placeholder="Cena">
                        @if($errors->first('price'))
                            <p class="text-danger">{{($errors->first('price'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <input type="number" name="quantity_in_stock" class="form-control" placeholder="Ilość">
                        @if($errors->first('quantity_in_stock'))
                            <p class="text-danger">{{($errors->first('quantity_in_stock'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <select name="category_id" class="form-control">
                            <option disabled selected>Kategoria</option>
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
                            <option disabled selected>Marka</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand['id']}}">{{ $brand['name'] }}</option>
                            @endforeach
                        </select>
                        @if($errors->first('brand_id'))
                            <p class="text-danger">{{($errors->first('brand_id'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <input type="file" id="img" name="image_src" class="form-control">
                        <label class="form-label" for="img">
                            Zdjęcie produktu
                        </label>
                        @if($errors->first('image_src'))
                            <p class="text-danger">{{($errors->first('image_src'))}}</p>
                        @endif
                    </div>
                    <div class="form-group text-center my-3">
                        <button type="submit" class="btn btn-lg btn-warning">Dodaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
