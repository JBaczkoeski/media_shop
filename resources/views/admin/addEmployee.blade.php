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
                <form class="container col-6">
                    <div class="form-group my-3">
                        <input type="text" name="first_name" class="form-control" placeholder="Imię">
                    </div>
                    <div class="form-group my-3">
                        <input type="text" name="last_name" class="form-control" placeholder="Nazwisko">
                    </div>
                    <div class="form-group my-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group my-3">
                        <input type="text" name="password" class="form-control" placeholder="Hasło tymczasowe">
                    </div>
                    <div class="form-group my-3">
                        <input type="text" name="password_confirmation" class="form-control" placeholder="Potwierdzenie hasła">
                    </div>
                    <div class="form-group my-3">
                        <input type="text" name="phone_number" class="form-control" placeholder="Numer telefonu">
                    </div>
                    <div class="form-group my-3">
                        <input type="text" name="street" class="form-control" placeholder="Ulica">
                    </div>
                    <div class="form-group my-3">
                        <input type="text" name="city" class="form-control" placeholder="Miasto">
                    </div>
                    <div class="form-group my-3">
                        <input type="text" name="postal_code" class="form-control" placeholder="Kod pocztowy">
                    </div>
                    <div class="form-group my-3">
                        <select type="text" name="provinces" class="form-control">
                            <option selected disabled>Województwo</option>
                            @foreach($provinces as $province)
                            <option value="{{$province['id']}}">{{$province['name']}}</option>
                            @endforeach
                        </select>
                    </div>
{{--                    <div class="form-group my-3">--}}
{{--                        Tu będzie id sklepu żeby dodać pracownika do klepu--}}
{{--                    </div>--}}
{{--                    <div class="form-group my-3">--}}
{{--                       Tu będzie id magazynu żeby dodać pracownika do magazynu --}}
{{--                    </div>--}}
                </form>
            </div>
        </div>
    </div>
@endsection
