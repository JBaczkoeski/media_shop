@extends('layout.admin')
@section('side_bar')
    @include('includes.adminEmployeesNavbar')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="container mt-5 pt-4">
                <div class="container col-12 h2 text-center">
                    Dodawanie pracownika
                </div>
                <form method="post" action="{{ route('employees.store') }}" class="container col-6">
                    @csrf
                    <div class="form-group my-3">
                        <select name="position" class="form-control" required>
                            <option selected disabled>Stanowisko</option>
                            <option value="shop_worker">Pracownik sklepu</option>
                            <option value="warehouse_worker">Pracownik magazynu</option>
                            <option value="shop_manager">Kierownik sklepu</option>
                        </select>
                        @if($errors->first('position'))
                            <p class="text-danger">{{($errors->first('position'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <input type="text" name="first_name" class="form-control" placeholder="Imię">
                        @if($errors->first('first_name'))
                            <p class="text-danger">{{($errors->first('first_name'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <input type="text" name="last_name" class="form-control" placeholder="Nazwisko">
                        @if($errors->first('last_name'))
                            <p class="text-danger">{{($errors->first('last_name'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        @if($errors->first('email'))
                            <p class="text-danger">{{($errors->first('email'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <input type="password" name="password" class="form-control" placeholder="Hasło tymczasowe">
                        @if($errors->first('password'))
                            <p class="text-danger">{{($errors->first('password'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <input type="password" name="password_confirmation" class="form-control"
                               placeholder="Potwierdzenie hasła">
                        @if($errors->first('password_confirmation'))
                            <p class="text-danger">{{($errors->first('password_confirmation'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <input type="text" name="phone_number" class="form-control" placeholder="Numer telefonu">
                        @if($errors->first('phone_number'))
                            <p class="text-danger">{{($errors->first('phone_number'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <input type="text" name="street" class="form-control" placeholder="Ulica">
                        @if($errors->first('street'))
                            <p class="text-danger">{{($errors->first('street'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <input type="text" name="city" class="form-control" placeholder="Miasto">
                        @if($errors->first('city'))
                            <p class="text-danger">{{($errors->first('city'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <input type="text" name="postal_code" class="form-control" placeholder="Kod pocztowy">
                        @if($errors->first('postal_code'))
                            <p class="text-danger">{{($errors->first('postal_code'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <select type="text" name="provinces_id" class="form-control">
                            <option selected disabled>Województwo</option>
                            @foreach($provinces as $province)
                                <option value="{{$province['id']}}">{{$province['name']}}</option>
                            @endforeach
                        </select>
                        @if($errors->first('provinces'))
                            <p class="text-danger">{{($errors->first('provinces'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <select type="text" name="shop_id" class="form-control">
                            <option selected disabled>Jeżeli pracownik sklepu wybierz sklep</option>
                            @foreach($stores as $store)
                                <option value="{{$store['id']}}">{{$store['name']}}</option>
                            @endforeach
                        </select>
                        @if($errors->first('shop_id'))
                            <p class="text-danger">{{($errors->first('shop_id'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <select type="text" name="warehouse_id" class="form-control">
                            <option selected disabled>Jeżeli pracownik magazynu wybierz magazyn</option>
                            @foreach($warehouses as $warehouse)
                                <option value="{{$warehouse['id']}}">{{$warehouse['name']}}</option>
                            @endforeach
                        </select>
                        @if($errors->first('shop_id'))
                            <p class="text-danger">{{($errors->first('$warehouse_id'))}}</p>
                        @endif
                    </div>
                    <div class="form-group my-3 text-center">
                        <button type="submit" class="btn btn-lg btn-warning">Dodaj pracownika</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
