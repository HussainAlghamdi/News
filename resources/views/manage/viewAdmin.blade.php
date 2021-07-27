<x-app-layout >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Articles') }}
            <button type="button" class="btn btn-dark ml-4">
                <a style="color:white" href="add">Add New News</a>
            </button>
        </h2>
    </x-slot>


    <div>
        <div class="flex flex-wrap mt-20 px-5 justify-around">
            @for ($i = 0; $i < count($news1); $i++)

            {{-- <img src="https://via.placeholder.com/450x250"> --}}
            <div class="custom-card focus-div rounded-xl p-4">
                <img src="{{ $news1[$i]->thumbnail }}" style="width: 416px; height: 233px;">
                <h2 class="text-2xl mt-2 title-font"><a href="{{ 'read/' . $news1[$i]->id }}">{{ $news1[$i]->title }}</a></h2>
                <p class="mt-1 content-font">
                    {!! strlen(strip_tags($news1[$i]->content))>300?Str::substr(strip_tags($news1[$i]->content), 0, 300) . '...':strip_tags($news1[$i]->content) !!}
                </p>
                <h4 class="mt-2">{{ $news1[$i]->author_name }}</h4>
                <h4>{{ $news1[$i]->date_publish }}</h4>
                <h4 class="pl-3 border-l-4 border-black mt-1">{{ $news1[$i]->category }}</h4>
                <div class="mt-2">
                    <button type="button" class="btn btn-dark"><a style="color:white"
                        href="{{ 'edit/' . $news1[$i]->id }}"> Edit </a></button>
                    <button type="button" class="btn btn-danger"><a style="color:white"
                        href="{{ 'add/' . $news1[$i]->id }}"> Delete </a></button>
                </div>
            </div>
        @endfor
        </div>
    </div>



</x-app-layout>
