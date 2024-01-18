@extends('layout.admin')
@section('side_bar')
    @include('includes.adminProductsNavbar')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12 mt-3">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Opis</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Ilość</th>
                        <th scope="col">Kategoria</th>
                        <th scope="col">Marka</th>
                        <th scope="col">Akcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 1; $i <= 11; $i++)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>Wartość 1</td>
                            <td>Wartość 2</td>
                            <td>Wartość 3</td>
                            <td>Wartość 4</td>
                            <td>Wartość 5</td>
                            <td>Wartość 6</td>
                            <td>
                                <a href="#" class="btn" title="Usuń"><i class="fa-solid fa-trash fa-xl" style="color: #ff0000;"></i></a>
                                <a href="#" class="btn" title="Edytuj"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #EFB70A;"></i></a>
                                <a href="#" class="btn" title="Zarchwizuj"><i class="fa-solid fa-box-archive fa-xl" style="color: #EFB70A;"></i></a>
                            </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
