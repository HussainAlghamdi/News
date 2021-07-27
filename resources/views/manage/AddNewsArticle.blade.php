
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

                        <form id="add-form" enctype="multipart/form-data" action="add" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label  for="usr">thumbnail :</label>
                                <input required  type="file" name="thumbnail" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="form-group">
                                 <label for="usr">title:</label>
                                <input required type="text" name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="form-group">
            <label for="usr">category:</label>
            <input required id="category" type="text" name="category" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">

            <?php $counter = 0;?>
            @foreach ($articleCategories as $articleCategory)
            <?php $counter++;?>
            <input type="radio" name="category-radio" id="category-radio-{{$counter}}"
            onclick="document.getElementById('category').value = '{{ $articleCategory->category }}'">
                        <label class="mr-3" for="category-radio-{{$counter}}"> {{$articleCategory->category}}</label>
            @endforeach
        </div>
        <div class="form-group">
            <label for="usr" hidden>author_name:</label>
            <input hidden type="text" name="author_name" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" >
        </div>
        <div class="form-group">

            <div id="standalone-container">
                <div id="toolbar-container"></div>
                <div id="editor-container"></div>
            </div>
            <textarea required id="mytextarea" hidden name="content" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
            </textarea>
        </div>


        <div class="form-group">
            <label hidden for="usr">date_publish:</label>
            <input hidden type="text" name="date_publish" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
        </div>



        <button type="button" onclick="Submit()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"> add new <button>
    </form>




    </div>
</div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],

  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'rtl' }],                         // text direction

  [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  [{ 'font': [] }],
  [{ 'align': [] }],
            ['link', 'image', 'video'],
  ['clean']                                         // remove formatting button
];
        var quill = new Quill('#editor-container', {
          modules: {
            syntax: true,
            toolbar: toolbarOptions
          },
          placeholder: 'Compose an epic...',
          theme: 'snow'
        });
      </script>

      <script>
          function Submit()
          {
              var content = document.getElementById('editor-container').firstChild
              var textArea = document.getElementById('mytextarea')
              textArea.innerHTML = content.innerHTML
              console.log(textArea.innerHTML)
              document.getElementById('add-form').submit()
          }
      </script>


</x-app-layout>
