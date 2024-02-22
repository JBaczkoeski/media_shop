@extends('layout.admin')
@section('content')
    <div class="container mx-auto px-6 py-8">
        <div class="flex flex-wrap -mx-2">
            <div class="w-full lg:w-1/2 px-2 mb-4">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">Nazwa</th>
                        <th scope="col" class="px-6 py-3">Akcje</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach($provinces as $province)
                        <tr>
                            <th scope="row" class="px-4 py-3"> {{$loop->iteration}} </th>
                            <td class="px-4 py-3">{{ $province['name'] }}</td>
                            <td class="px-4 py-3">
                                <form action="/admin/uzytkownicy/region/usun/{{$province['id']}}" method="POST"
                                      style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Usuń">
                                        <i class="text-red-600 fa-solid fa-trash fa-xl"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="w-full lg:w-1/2 px-2">
                <div class="text-center text-2xl font-bold mb-10">
                    Dodaj region
                </div>
                <form class="text-center d-flex justify-content-center row" method="post"
                      action="{{ route('provinces.store') }}">
                    @csrf
                    <div class="form-group col-7 my-5">
                        <input class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               type="text"
                               name="name"
                               placeholder="Nazwa"
                        >
                    </div>
                    <div class="form-group col-7">
                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-black font-bold py-2 px-4 rounded">Dodaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
