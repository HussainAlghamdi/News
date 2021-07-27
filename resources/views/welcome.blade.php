@extends("layouts.app2")

@section('header')
<div class="flex justify-content-center">

    <h1 class="" style="font-size: 40px"> Saudi Arabia News </h1>
</div>
@endsection


@section('content')






    <div class="flex mt-20 px-5 mx-4 mb-3" style="width: 96vw">
        <div class="mx-5 flex-1 focus-div rounded-xl p-2">
            <a href="{{'readNews/' . $news1[0]->id}}">
            {{-- <img src="https://via.placeholder.com/600x400"> --}}
            <img src="{{$news1[0]->thumbnail}}" style="width: 625px; height: 350px;">
            <h2 class="text-4xl mt-4 title-font">{{$news1[0]->title}}</h2>
            <p class="text-xl mt-2 content-font">
                {!! Str::substr(strip_tags($news1[0]->content), 0, 200) . "..." !!}
                {{-- {!! Str::substr($news1[0]->content, 0, 40) . "..." !!} --}}
            </p>
            <h4 class="mt-2">{{$news1[0]->author_name}}</h4>
            <h4>{{Carbon\Carbon::parse($news1[0]->date_publish)->diffForHumans()}}</h4>
            <h4 class="pl-3 border-l-4 border-black mt-1">{{$news1[0]->category}}</h4>
        </a>
        </div>
        <div class="home-spliter">

        </div>
        <div class="flex-1 ">
            @php
                $news_index = 1;
            @endphp

            @for ($i = 0; $i < 3; $i++)
                <div id="latest-{{ $i+1 }}" {{ ($i+1) == 1  ? '' : 'hidden' }} class="home-cards " style="min-height: 530px">
                    @for ($j =0 ; $j < 3; $j++)
                        @if ( $news_index < count($news1))
                        <a href="{{'readNews/' . $news1[$news_index]->id}}">
                        <div class="flex mb-2 focus-div rounded-xl p-2">
                            {{-- <img src="https://via.placeholder.com/150x100"> --}}
                            <img src="{{$news1[$news_index]->thumbnail}}" style="width: 276px; height: 125px;">
                            <div class="pl-3">
                                <h6 class="text-xl title-font">{{$news1[$news_index]->title}}</h6>
                                <p class="content-font">
                                    {{-- {!! Str::substr(strip_tags($news1[$news_index]->content), 0, 30) . "..." !!} --}}
                                    {{-- {!! Str::substr($news1[$news_index]->content, 0, 20) . "..." !!} --}}
                                </p>
                                <h4 class="mt-2">{{$news1[$news_index]->author_name}}</h4>
                                <h4>{{Carbon\Carbon::parse($news1[0]->date_publish)->diffForHumans()}}</h4>
                                <h4 class="pl-3 border-l-4 border-black mt-1">{{$news1[$news_index]->category}}</h4>
                            </div>
                        </div>
                    </a>
                        @php
                        $news_index++
                        @endphp
                        @endif
                    @endfor
                </div>
            @endfor

            {{-- <div class="flex">
                <img src="https://via.placeholder.com/150x100">
                <div class="pl-3">
                    <h2 class="text-2xl">Title2</h2>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam ad explicabo accusamus nemo
                        ducimus impedit, fugit, quos voluptates necessitatibus sapiente harum. Soluta ratione animi
                        maiores repudiandae cupiditate at molestiae facilis?
                    </p>
                </div>
            </div> --}}

            <nav class="flex justify-center " >
                <ul class="pagination ">
                    <li class="page-item">
                        <div role="button" class="page-link" onclick="prev()" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </div>
                    </li>
                    <li class="page-item">
                        <div class="page-link" role="button" onclick="swapTo(1)">1</div>
                    </li>
                    <li class="page-item">
                        <div class="page-link" role="button" onclick="swapTo(2)">2</div>
                    </li>
                    <li class="page-item">
                        <div class="page-link" role="button" onclick="swapTo(3)">3</div>
                    </li>
                    <li class="page-item">
                        <div role="button" class="page-link" onclick="next()" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </div>
                    </li>
                </ul>
            </nav>
     </div>

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

                                </tr> --}}

    {{-- @foreach ($news1 as $news)
                                <tr>
                                    <td>{{$news->title}}</td>
                                    <td>{{$news->category}}</td>
                                    <td>{{$news->author_name}}</td>
                                    <td>{!! $news->content !!}</td>
                                    <td>{{$news->date_publish}}</td>
                                </tr> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        function next() {
            if (document.getElementById("latest-1").hidden == false) {
                document.getElementById("latest-1").hidden = true;
                document.getElementById("latest-2").hidden = false;
                document.getElementById("latest-3").hidden = true;
            }
            else if (document.getElementById("latest-2").hidden == false) {
                document.getElementById("latest-1").hidden = true;
                document.getElementById("latest-2").hidden = true;
                document.getElementById("latest-3").hidden = false;
            }

        }

        function prev() {

            if (document.getElementById("latest-2").hidden == false) {
                document.getElementById("latest-1").hidden = false;
                document.getElementById("latest-2").hidden = true;
                document.getElementById("latest-3").hidden = true;
            }
            else if (document.getElementById("latest-3").hidden == false) {
                document.getElementById("latest-1").hidden = true;
                document.getElementById("latest-2").hidden = false;
                document.getElementById("latest-3").hidden = true;
            }
        }

        function swapTo(page) {
            if (page == 1) {
                document.getElementById("latest-1").hidden = false;
                document.getElementById("latest-2").hidden = true;
                document.getElementById("latest-3").hidden = true;
            }
            if (page == 2) {
                document.getElementById("latest-1").hidden = true;
                document.getElementById("latest-2").hidden = false;
                document.getElementById("latest-3").hidden = true;
            }
            if (page == 3) {
                document.getElementById("latest-1").hidden = true;
                document.getElementById("latest-2").hidden = true;
                document.getElementById("latest-3").hidden = false;
            }
        }
    </script>

@endsection
