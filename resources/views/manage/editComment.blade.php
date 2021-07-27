
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
    <form action="/editComment/{{$comment->id}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    {{ csrf_field() }}
    <div class="form-group">
        {{-- <label for="usr">title:</label> --}}
        <input type="text" name="is_approved" value="{{$comment->is_approved}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div class="form-group">
        {{-- <label for="usr">title:</label> --}}
        <input type="text" name="is_hidden" value="{{$comment->is_hidden}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
        
        <div class="form-group" >
            <textarea  id="mycomment" name="comment" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">{{ $comment->comment}}</textarea>
        </div>
         {{-- <button type="button" onclick="Submit()" id="add-form" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"> test</button> --}}
        <input type="submit"  value="update" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
    </form>


    </div>
    </div>
            </div>
        </div>
    </div>
    <script>
        console.log(document.getElementById('mycomment').innerHTML);
    </script>
</x-app-layout>


