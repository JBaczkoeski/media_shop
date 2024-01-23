@extends('layout.admin')
@section('side_bar')
    @include('includes.adminStoresNavbar')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="container mt-5 pt-4">
                <div class="container col-12 h2 my-5 text-center">
                    Dodawanie pracownika
                </div>
                <form method="post" action="{{ route('stores.store') }}" class="container col-6">
                    @csrf
                    <div class="form-group my-3">
                        <input type="text" name="name" class="form-control" value="Media shop - " placeholder="Nazwa">
                        @if($errors->first('name'))
                            <p class="text-danger">{{($errors->first('name'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <input type="text" name="address" class="form-control" placeholder="Adres">
                        @if($errors->first('address'))
                            <p class="text-danger">{{($errors->first('address'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <input type="text" name="city" class="form-control" placeholder="Miasto">
                        @if($errors->first('city'))
                            <p class="text-danger">{{($errors->first('city'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <select type="text" name="province_id" class="form-control">
                            <option selected disabled>Województwo</option>
                            @foreach($provinces as $province)
                                <option value="{{$province['id']}}">{{$province['name']}}</option>
                            @endforeach
                        </select>
                        @if($errors->first('province_id'))
                            <p class="text-danger">{{($errors->first('province_id'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3 text-center">
                        <button type="submit" class="btn btn-warning">Dodaj sklep</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
