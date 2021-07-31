@extends('layouts.app2')

@section('header')

    <h1 style="font-size: 40px">Advance Search</h1>
@endsection

@section('content')

    <div class="py-12 mt-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">


                        <form id="add-form" action="/newsarticles/advanceSearch" method="POST"
                            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="usr">search:</label>
                                <input type="text" name="search" placeholder="title , content or author"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="form-group mt-4">
                                <label for="usr">categories :</label>
                                @for ($i = 0; $i < count($category); $i++)
                                    <input class="ml-2" type="checkbox" name="categories[]"
                                        value="{{ $category[$i]->category }}">
                                    <label> {{ $category[$i]->category }} </label>
                                @endfor
                            </div>
                            <div class="form-group mt-4">
                                <label for="usr">from :</label>
                                <input type="date" name="from"
                                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">

                                <label for="usr">To :</label>
                                <input type="date" name="to"
                                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                            </div>



                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                search <button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        const form = document.getElementById("adv");
    </script>

@endsection
