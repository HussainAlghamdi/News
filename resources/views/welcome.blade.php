@extends("layouts.app2")

@section('header')
<div class="flex justify-content-center">

    <h1 class="" style="font-size: 40px"> Saudi Arabia News </h1>
</div>
@endsection


@section('content')






    <div class="flex mt-20 px-5 mx-4 mb-3" style="width: 96vw">
        <div class="mx-5 flex-1 focus-div rounded-xl p-2">
            <a href="/newsarticles/{{ $news1[0]->id}}">

            <img src="{{$news1[0]->thumbnail}}" style="width: 625px; height: 350px;">
            <h2 class="text-4xl mt-4 title-font">{{$news1[0]->title}}</h2>
            <p class="text-xl mt-2 content-font">
                {!! Str::substr(strip_tags($news1[0]->content), 0, 200) . "..." !!}

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
                        <a href="/newsarticles/{{ $news1[$news_index]->id}}">
                        <div class="flex mb-2 focus-div rounded-xl p-2">

                            <img src="/{{$news1[$news_index]->thumbnail}}" style="max-width: 276px; max-height: 125px;">
                            <div class="pl-3">
                                <h6 class="text-xl title-font">{{$news1[$news_index]->title}}</h6>
                                <p class="content-font">


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
