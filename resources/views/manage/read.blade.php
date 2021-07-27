<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="relative">
                            <img src="../{{ $news2->thumbnail }}" style="width: 100%; ">
                            <div class="absolute image-card flex items-center">
                                <p class="title-font text-3xl">
                                    {{ $news2->title }}
                                </p>
                            </div>
                        </div>
                        <br>
                        <h3 class="text-xl title-font ">{{ $news2->author_name }}</h3>
                        <h3 class="text-xl title-font ">{{ $news2->date_publish }}</h3>
                        <h3 class="text-3xl title-font pl-3 border-l-4 border-black mt-1">{{ $news2->category }}</h3>
                        <div class="content-p">
                            <p class="mt-3" >{!! $news2->content !!}</p>

                        </div>
                        <div class="mt-10" style="text-align: center">
                            @foreach ($news2->comments as $cn)

                            <div class="ml-4 mx-auto">
                                <div class="container mx-auto">
                                    <div class="card mt-3">
                                        <div class="flex no-gutters flex-wrap">
                                            <div class="col-md-4 border-r border-gray-200">
                                                <div class="ratings text-center p-4 py-5"> <span class="badge bg-success">User</span> <span class="d-block"><h1 class="text-xl">{{$cn->name}}</span> </div>
                                            </div>
                                            <div class="col-md-8 text-left pl-5 mt-auto mb-2 ">
                                                <p>{{$cn->comment}}</p>
                                                <div class="flex justify-end align-end mr-2 flex-wrap">
                                                    <button type="button" class="m-2  btn btn-dark"><a style="color:white" href="/{{'editComment/'.$cn->id}}"> Edit </a></button>
                                                    <button type="button" class="m-2 btn btn-danger"><a style="color:white" href="/{{'deleteComment/'.$cn->id}}"> Delete </a></button>
                                                    @if (! $cn->is_approved)
                                                    <button type="button" class="m-2 btn btn-success"><a style="color:white" href="/{{'ApproveComment/'.$cn->id}}"> Approve </a></button>
                                                    @elseif (! $cn->is_hidden)
                                                    <button type="button" class="m-2 btn btn-warning"><a style="color:white" href="/{{'HideComment/'.$cn->id}}"> Hide </a></button>
                                                    @else
                                                    <button type="button" class="m-2 btn btn-success"><a style="color:white" href="/{{'ShowComment/'.$cn->id}}"> Show </a></button>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </div>
                        <form action="/read/{{ $news2->id }}" method="POST"
                            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-3">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="usr">name:</label>
                                <input type="text" name="name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="form-group">
                                <label for="usr">comment:</label>
                                <textarea rows="4" cols="50" name="comment"
                                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                            </div>

                            <input type="submit" value="add comment"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>














</x-app-layout>
