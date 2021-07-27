@extends('layouts.app2')

@section('header')

<h1 style="font-size: 40px">News</h1>
@endsection

@section('content')

    @php
    $news_index = 0;
    @endphp


    {{-- <img src="{{$news1[$news_index]->thumbnail}}" style="width: 150px; height: 100px;">
<div class="pl-3">
    <h2 class="text-2xl">{{$news1[$news_index]->title}}</h2>
    <p>
        {!! Str::substr($news1[$news_index]->content, 0, 10) . "..." !!}
    </p>
    <h4>{{$news1[$news_index]->author_name}}</h4>
    <h4>{{$news1[$news_index]->date_publish}}</h4>
    <h4>{{$news1[$news_index]->category}}</h4> --}}

    <div>
        <div class="flex mt-20 px-5 justify-around">
            @for ($i = 0; $i < 3; $i++)
                @if ($news_index < count($news1))
                {{-- <img src="https://via.placeholder.com/450x250"> --}}
                <div class="custom-card focus-div rounded-xl p-4"  style="margin-left: 8 px">
                    <a href="{{ 'readNews/' . $news1[$news_index]->id }}">
                <img src="{{ $news1[$news_index]->thumbnail }}" style="width: 416px; height: 233px;">
                <h2 class="text-2xl mt-2 title-font">{{ $news1[$news_index]->title }}</h2>
                <p class="mt-1 content-font">
                    {!! strlen(strip_tags($news1[$i]->content))>100?Str::substr(strip_tags($news1[$i]->content), 0, 100) . '...':strip_tags($news1[$i]->content) !!}
                </p>
                <h4 class="mt-2">{{ $news1[$news_index]->author_name }}</h4>
                <h4>{{ Carbon\Carbon::parse($news1[$news_index]->date_publish)->diffForHumans() }}</h4>
                <h4 class="pl-3 border-l-4 border-black mt-1">{{ $news1[$news_index]->category }}</h4>
            </a>
            </div>
        @php
            $news_index++;
        @endphp @endif @endfor
        </div>
    </div>


    <div class="mt-12 px-5">
        @for (; $news_index < count($news1); $news_index++)

        <a href="{{ 'readNews/' . $news1[$news_index]->id }}">
        <div class="flex mb-3 focus-div rounded-xl p-2">
            {{-- <img src="https://via.placeholder.com/150x100"> --}}
                <img src="{{ $news1[$news_index]->thumbnail }}" style="width: 208px;">
                <div class="pl-3">
                    <h2 class="text-2xl title-font">{{ $news1[$news_index]->title }}</h2>
                    <p class="content-font">
                    {!! strlen(strip_tags($news1[$i]->content))>300?Str::substr(strip_tags($news1[$i]->content), 0, 300) . '...':strip_tags($news1[$i]->content) !!}

                    </p>
                    <h4 class="mt-2">{{ $news1[$news_index]->author_name }}</h4>
                    <h4>{{  Carbon\Carbon::parse($news1[$news_index]->date_publish)->diffForHumans()  }}</h4>
                    <h4 class="pl-3 border-l-4 border-black mt-1">{{ $news1[$news_index]->category }}</h4>
                </div>
            </div>
        </a>
        @endfor
    </div>
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">

                      <table class="table table-striped">

                        <tr>
                            <td> Title </td>
                            <td> category </td>
                            <td> author_name </td>
                            <td> content </td>
                            <td> date_publish </td>

                        </tr>

                        @foreach ($news1 as $news)
                        <tr>
                            <td><a href="{{'read2/' . $news->id}}">{{$news->title}}</a></td>
                            <td>{{$news->category}}</td>
                            <td>{{$news->author_name}}</td>
                            <td>{!! $news->content !!}</td>
                            <td>{{$news->date_publish}}</td>
                        </tr>


                        @endforeach

                      </table>




                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

@endsection
