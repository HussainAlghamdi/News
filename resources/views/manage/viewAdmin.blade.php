<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Articles') }}
            <button type="button" class="btn btn-dark ml-4">
                <a style="color:white" href="/newsarticles/create">Add New News</a>
            </button>
        </h2>
    </x-slot>


    <div>
        <div class="flex flex-wrap mt-20 px-5 justify-around">
            @for ($i = 0; $i < count($news1); $i++)


                <div class="custom-card focus-div rounded-xl p-4">
                    <img src="/{{ $news1[$i]->thumbnail }}" style="width: 416px; height: 233px;">
                    <h2 class="text-2xl mt-2 title-font"><a
                            href="/newsarticles/{{ $news1[$i]->id }}">{{ $news1[$i]->title }}</a></h2>
                    <p class="mt-1 content-font">
                        {!! strlen(strip_tags($news1[$i]->content)) > 300 ? Str::substr(strip_tags($news1[$i]->content), 0, 300) . '...' : strip_tags($news1[$i]->content) !!}
                    </p>
                    <h4 class="mt-2">{{ $news1[$i]->author_name }}</h4>
                    <h4>{{ $news1[$i]->date_publish }}</h4>
                    <h4>number of visitors : {{ $news1[$i]->number_visitors }}</h4>
                    <h4 class="pl-3 border-l-4 border-black mt-1">{{ $news1[$i]->category }}</h4>
                    <div class="mt-2 flex">
                        <button type="button" class="btn btn-dark"><a style="color:white"
                                href="/newsarticles/{{ $news1[$i]->id }}/edit"> Edit </a></button>


                        <form action="/newsarticles/{{ $news1[$i]->id }}" method="post">
                            @method('DELETE')
                            @csrf

                            <button type="submit" class="btn btn-danger">
                                Delete</button>
                        </form>


                    </div>
                </div>
            @endfor
        </div>
    </div>



</x-app-layout>
