@extends('layout.admin')
@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="container col-6">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Akcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($provinces as $province)
                        <tr>
                            <th scope="row"> {{$loop->iteration}} </th>
                            <td>{{ $province['name'] }}</td>
                            <td>
                                <form action="/admin/uzytkownicy/region/usun/{{$province['id']}}" method="POST"
                                      style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn" title="Usuń">
                                        <i class="fa-solid fa-trash fa-xl" style="color: #ff0000;"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="container col-6">
                <div class="container col-12 text-center h3">
                    Dodaj region
                </div>
                <form class="text-center d-flex justify-content-center row" method="post"
                      action="{{ route('provinces.store') }}">
                    @csrf
                    <div class="form-group col-7 my-5">
                        <input class="form-control" type="text" name="name" placeholder="Nazwa">
                    </div>
                    <div class="form-group col-7">
                        <button type="submit" class="btn btn-warning btn-lg">Dodaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
