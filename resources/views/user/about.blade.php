@extends('layouts.app2')


@section('header')

<h1 style="font-size: 40px">About us</h1>
@endsection

@section('content')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container ">
                        <div class="relative">
                            <img src="{{ asset('images/1623873.jpg') }}">
                            <div class="absolute image-card flex items-center" >
                                <p class="title-font text-3xl">
                                    SAN is one of those platforms that gives you the information you need to stay updated.
                                </p>
                            </div>
                        </div>
                        <br>
                        <h1 class="text-5xl title-font mt-140">Who We Are</h1>
                        <p class="mt-3">SAN is a multifaceted digital media company dedicated to helping citizens, consumers, business leaders and policy officials make important decisions in their lives. We publish independent reporting, rankings, data journalism and advice that has earned the trust of our readers and users for nearly 90 years. Our platforms on usnews.com include Education, Health, Money, Travel, Cars, News and 360 Reviews.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection
