<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script type="text/javascript">
  tinymce.init({
    selector: '#mytextarea'
  });
</script> --}}

{{-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> --}}
<title>Full Editor - Quill Rich Text Editor</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="language" content="english">
<meta name="viewport" content="width=device-width">
<meta name="description" content="Quill is a free, open source WYSIWYG editor built for the modern web. Completely customize it for any need with its modular architecture and expressive API.">
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@quilljs">
<meta name="twitter:title" content="Full Editor - Quill">
<meta name="twitter:description" content="Quill is a free, open source rich text editor built for the modern web.">
<meta name="twitter:image" content="https://quilljs.com/assets/images/brand-asset.png">
<meta property="og:type" content="website">
<meta property="og:url" content="https://quilljs.com/standalone/full/">
<meta property="og:image" content="https://quilljs.com/assets/images/brand-asset.png">
<meta property="og:title" content="Full Editor - Quill">
<meta property="og:site_name" content="Quill">
<link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
<link rel="canonical" href="https://quilljs.com/standalone/full/">
<link type="application/atom+xml" rel="alternate" href="https://quilljs.com/feed.xml" title="Quill - Your powerful rich text editor">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css">
<link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Arvo:wght@700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Pirata+One&display=swap" rel="stylesheet">
<style>
    body > #standalone-container {
      margin: 50px auto;
      max-width: 720px;
    }
    #editor-container {
      height: 350px;
    }
    </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100" style="font-family: 'Arvo', serif;">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
