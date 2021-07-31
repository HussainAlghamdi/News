@extends('layouts.app2')

@section('header')

    <h1 style="font-size: 40px">Search</h1>
@endsection

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">


                    @php
                        $news_index = 0;
                    @endphp

                    <div class="flex p-4 justify-around grid xl:grid-cols-3 lg:grid-cols-2 md:grid-cols-1 gap-4">
                        @foreach ($news1 as $news)
                            <div class="focus-div rounded-xl p-4"
                                style="display: flex;flex-direction: column;justify-content: space-between;">
                                <a href="/newsarticles/{{ $news->id }}">
                                    <img src="/{{ $news->thumbnail }}" style="width: 416px; height: 233px;">
                                    <div>
                                        <h2 class="text-2xl mt-2 title-font">{{ $news->title }}</h2>
                                        <p class="mt-1 content-font">
                                            {!! Str::substr(strip_tags($news->content), 0, 200) . '...' !!}
                                        </p>
                                        <div>
                                            <h4 class="mt-5">{{ $news->author_name }}</h4>
                                            <h4>{{ Carbon\Carbon::parse($news->date_publish)->diffForHumans() }}</h4>
                                            <h4 class="pl-3 border-l-4 border-black mt-1">{{ $news->category }}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        @endforeach
                    </div>
                </div>




            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

@endsection
