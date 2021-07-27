<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>
    @php
    $news_index = 0;
    @endphp
    <div>
        <div class="flex mt-20 px-5 justify-around">
            @for ($i = 0; $i < 3; $i++)
                @if ($news_index < count($news1))

            <div class="custom-card focus-div rounded-xl p-4"  style="margin-left: 8 px">
                <img src="{{ $news1[$news_index]->thumbnail }}" style="width: 416px; height: 233px;">
                <h2 class="text-2xl mt-2 title-font"><a href="{{ 'readNews/' . $news1[$news_index]->id }}">{{ $news1[$news_index]->title }}</a></h2>
                <p class="mt-1 content-font">
                    {!! strlen(strip_tags($news1[$i]->content))>100?Str::substr(strip_tags($news1[$i]->content), 0, 100) . '...':strip_tags($news1[$i]->content) !!}
                </p>
                <h4 class="mt-2">{{ $news1[$news_index]->author_name }}</h4>
                <h4>{{ $news1[$news_index]->date_publish }}</h4>
                <h4 class="pl-3 border-l-4 border-black mt-1">{{ $news1[$news_index]->category }}</h4>
            </div>
        @php
            $news_index++;
        @endphp @endif @endfor
        </div>


    <div class="mt-12 px-5">
        @for (; $news_index < count($news1); $news_index++)

            <div class="flex mb-3 focus-div rounded-xl p-4">

                <img src="{{ $news1[$news_index]->thumbnail }}" style="width: 208px;">
                <div class="pl-3">
                    <h2 class="text-2xl title-font"><a
                            href="{{ 'readNews/' . $news1[$news_index]->id }}">{{ $news1[$news_index]->title }}</a></h2>
                    <p class="content-font">
                    {!! strlen(strip_tags($news1[$i]->content))>300?Str::substr(strip_tags($news1[$i]->content), 0, 300) . '...':strip_tags($news1[$i]->content) !!}
                    </p>
                    <h4 class="mt-2">{{ $news1[$news_index]->author_name }}</h4>
                    <h4>{{ $news1[$news_index]->date_publish }}</h4>
                    <h4 class="pl-3 border-l-4 border-black mt-1">{{ $news1[$news_index]->category }}</h4>
                </div>
            </div>
        @endfor
    </div>
        </div>
    </div>
</x-app-layout>
