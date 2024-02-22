@extends('layout.admin')
@section('side_bar')
    @include('includes.adminProductsNavbar')
@endsection
@section('content')
    <div class="w-full flex justify-center items-start min-h-screen py-10">
        <div class="w-full flex justify-center items-start min-h-screen">
            <div class="w-1/2 border-4 rounded-3xl p-4 my-5">
                <div class="text-center text-2xl font-bold mb-10">
                    EDYTUJ PRODUKT
                </div>
                <div class="flex justify-center">
                    <form method="post"
                          class="w-1/2"
                          action="{{ route('product.update', ['product' => $product['id']]) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <input type="hidden"
                               name="id"
                               value="{{ $product['id'] }}"
                        >
                        <div class="form-group my-3">
                            <input type="text"
                                   value="{{ $product['name'] }}"
                                   name="name"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nazwa produktu">
                            @if($errors->first('name'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('name'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group my-3">
                        <textarea name="description"
                                  class="ckeditor"
                        >
                            {{ $product['description'] }}
                        </textarea>
                            @if($errors->first('description'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('description'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group my-3">
                            <input type="number"
                                   value="{{ $product['price'] }}"
                                   name="price"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   placeholder="Cena"
                            >
                            @if($errors->first('price'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('price'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group my-3">
                            <select name="category_id"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            >
                                <option value="{{ $product['category_id'] }}"
                                        selected>{{ $product['category']['name'] }}
                                </option>
                                @foreach($categories as $category)
                                    <option value="{{$category['id']}}">
                                        {{ $category['name'] }}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->first('category_id'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('category_id'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group my-3">
                            <select name="brand_id"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            >
                                <option value="{{ $product['brand_id'] }}"
                                        selected>{{ $product['brand']['name'] }}
                                </option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand['id']}}">
                                        {{ $brand['name'] }}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->first('brand_id'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('brand_id'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group my-3">
                            <img class="img-fluid"
                                 src="{{ asset('storage/products/' . $product['image_src']) }}"
                                 alt="zdjęcie produktu"
                            >
                            <div class="mt-5 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-300"
                                         viewBox="0 0 24 24"
                                         fill="currentColor"
                                         aria-hidden="true"
                                    >
                                        <path fill-rule="evenodd"
                                              d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                              clip-rule="evenodd"
                                        />
                                    </svg>
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                        <label for="file-upload"
                                               class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload"
                                                   name="image_src"
                                                   type="file"
                                                   class="sr-only"
                                            >
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF do 10MB</p>
                                </div>
                            </div>
                            @if($errors->first('image_src'))
                                <p class="w-full text-red-600 text-md mt-1">
                                    {{($errors->first('image_src'))}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group text-center my-3">
                            <button type="submit"
                                    class="btn bg-yellow-400 text-2xl font-bold rounded-3xl p-3 mt-2"
                            >
                                Edytuj
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
