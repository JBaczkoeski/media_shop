@extends('layout.admin')
@section('side_bar')
    @include('includes.adminEmployeesNavbar')
@endsection
@section('content')
{{$employees}}
@endsection
