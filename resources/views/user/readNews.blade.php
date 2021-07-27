{{-- <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="container">
 --}}

 @extends('layouts.app2')

 @section('header')

<h1 style="font-size: 40px">News Page</h1>
@endsection

 @section('content')



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
                        @if ($cn->is_approved && !$cn->is_hidden)
                        <div class="ml-4 mx-auto">
                            <div class="container mx-auto">
                                <div class="card mt-3">
                                    <div class="flex no-gutters items-center">
                                        <div class="col-md-4 border-r border-gray-200">
                                            <div class="ratings text-center p-4 py-5"> <span class="badge bg-success">User</span> <span class="d-block"><h1 class="text-xl">{{$cn->name}}</span> </div>
                                        </div>
                                        <div class="col-md-8 text-left pl-5">
                                            <p>{{$cn->comment}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>
                    <form action="/readNews/{{ $news2->id }}" method="POST"
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






                    {{-- <div>
                        <div class="mt-10 px-5 justify-around center">

                            <div>

                                <div style="display:flex;justify-content: center">
                                    <img src="../{{ $news2->thumbnail }}" style="width: 516px; height: 333px;">

                                </div>
                                <div>
                                    <h2 style="text-align: center; font-weight:bold" class="text-2xl mt-2">{{ $news2->title }}</>
                                    </h2>
                                    <p class="mt-1">
                                        {!! $news2->content !!}
                                    </p>
                                    <h4 class="mt-2">{{ $news2->author_name }}</h4>
                                    <h4>{{ $news2->date_publish }}</h4>
                                    <h4 class="pl-3 border-l-4 border-black mt-1">{{ $news2->category }}</h4>
                                </div>
 --}}



                                {{-- @foreach ($news2->comments as $cn)
                                @if ($cn->is_approved && !$cn->is_hidden)
                                <div style="display:flex;justify-content: center" class="mt-10">
                                    <div class="ml-4">
                                        <h3>name</h3>
                                        {{$cn->name}}

                                    </div>
                                    <div class="ml-4">
                                        <h3>Comments</h3>
                                         {{$cn->comment}}

                                    </div>

                                </div>
                                @endif

                                @endforeach --}}





                                {{-- <div class="mt-10" style="text-align: center">

                                    <table class="table table-striped ">

                                        <tr>
                                            <td> name </td>
                                            <td> Comments </td>
                                        </tr>

                                        @foreach ($news2->comments as $cn)

                                        @if ($cn->is_approved && !$cn->is_hidden)
                                        <tr>
                                            <td> {{ $cn->name }} </td>
                                            <td> {{ $cn->comment }} </td>
                                        </tr>
                                        @endif

                                        @endforeach

                                    </table>

                                </div>
                                <form action="/readNews/{{ $news2->id }}" method="POST"
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
                    </div> --}}

@endsection
{{--
                    <form action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="usr">title:</label>
                            {{ $news2->title }}
                        </div>
                        <div class="form-group">
                            <label for="usr">category:</label>
                            {{ $news2->category }}
                        </div>
                        <div class="form-group">
                            <label for="usr">author_name:</label>
                            {{ $news2->author_name }}
                        </div>
                        <div class="form-group">
                            <label for="usr">content:</label>
                            {!! $news2->content !!}
                            <img src="{{$news2->content}}" width="150px" height="210px" >

                        </div>
                        <div class="form-group">
                            <label hidden for="usr">date_publish:</label>
                            {{ $news2->date_publish }}
                        </div>

                        <div class="form-group">

                            <table class="table table-striped">

                                <tr>
                                    <td> name </td>
                                    <td> Comments </td>
                                </tr>

                                @foreach ($news2->comments as $cn)

                                    @if ($cn->is_approved && !$cn->is_hidden)
                                        <tr>
                                            <td> {{ $cn->name }} </td>
                                            <td> {{ $cn->comment }} </td>
                                        </tr>
                                    @endif

                                @endforeach

                            </table>
                            <form action="/readNews/{{ $news2->id }}" method="POST"
                                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
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
                    </form> --}}
