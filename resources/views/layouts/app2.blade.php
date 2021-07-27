<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arvo:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pirata+One&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cfa6f72dd4.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/kutty@latest/dist/alpinejs.min.js"></script>
    <!-- And then the single component -->
    <script src="https://cdn.jsdelivr.net/npm/kutty@latest/dist/dropdown.min.js"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>

</head>

<body class="antialiased">
    

    <header class="z-30 w-full px-2 py-2 bg-custom1 shadow sm:px-4">
        <div class="flex items-center justify-between mx-auto max-w-7xl">
          <div class="flex items-center space-x-3">

            
            <div class="inline-flex md:hidden" x-data="{ open: false }">
              <button class="flex-none px-2 btn btn-white btn-sm" @click="open = true">
                <i class="fas fa-bars"></i>
                
              </button>
              <div class="absolute top-0 left-0 right-0 z-50 flex flex-col p-2 m-2 space-y-2 bg-custom1 rounded shadow" x-show.transition="open" @click.away="open = false" x-cloak>
                <button class="self-start flex-none px-2 btn bg-white btn-icon" @click="open = false">
                    <i class="far fa-window-close"></i>
                  
                </button>
                <a class="btn btn-sm btn-icon nav-btn" href="/">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mr-2">
                      <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"
                      />
                    </svg>
                    Home
                  </a>

                  <a class="btn btn-sm btn-icon nav-btn" href="/allnews">

                    <i class="mr-2 far fa-newspaper"></i>

                    News
                  </a>
                  <a class="btn btn-sm btn-icon nav-btn" href="/contact">

                    <i class="mr-2 far fa-address-card"></i>
                    Contact
                  </a>
                  <a class="btn btn-sm btn-icon nav-btn" href="/about">

                    <i class="mr-2 fas fa-info-circle"></i>

                    About
                  </a>
                  <a class="btn btn-sm btn-icon nav-btn" href="/advanceSearch">

                    <i class="mr-2 fas fa-search"></i>
                    Advance Search
                  </a>

              </div>
            </div>
                
                
            <a href="/" title="Kutty Home Page" class="flex items-center">
                <div class="logo "  style="font-family: 'Patua One', cursive;">
                    <span>S</span>
                    <span>A</span>
                    <span>N</span>
                </div>
                <div class=" sign-in btn btn-sm btn-icon nav-btn" style="font-family: 'Arvo', serif;">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="linkNav"><i class="fas fa-sign-in-alt"></i>

                                Sign in</a>
                        @endauth
                    @endif
                </div>

            </a>
          </div>
          <div class="hidden space-x-1 md:inline-flex" style="font-family: 'Arvo', serif;">
            <a class="linkNav btn btn-sm btn-icon nav-btn" href="/">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mr-2">
                <path
                  d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"
                />
              </svg>
              Home
            </a>

            <a class="linkNav btn btn-sm btn-icon nav-btn" href="/allnews">
              <i class="mr-2 far fa-newspaper"></i>
              News
            </a>
            <a class="linkNav btn btn-sm btn-icon nav-btn" href="/contact">
              <i class="mr-2 far fa-address-card"></i>
              Contact
            </a>
            <a class="linkNav btn btn-sm btn-icon nav-btn" href="/about">
              <i class="mr-2 fas fa-info-circle"></i>
              About
            </a>
            <a class="linkNav btn btn-sm btn-icon nav-btn" href="/advanceSearch">
              <i class="mr-2 fas fa-search"></i>
              Advance Search
            </a>


                
          </div>
            
            <div class="search-section">
                {{-- <input>
                <button>
                    <a>
                        Search
                    </a>
                </button> --}}
                <form action="/search" method="GET" class="form-inline my-2 my-lg-0">
                    <div class="relative text-gray-600 focus-within:text-gray-400">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>                            </button>
                        </span>
                        <input type="search" name="query" class="py-2 text-sma bg-gray-100 rounded-md pl-10 focus:outline-none focus:bg-white focus:text-gray-900" placeholder="Search..." autocomplete="off">
                    </div>
                </form>
            </div>

            

        </div>
      </header>

    
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class=" max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" style="font-family: 'Patua One', cursive;" >
                @yield('header')
            </div>
        </header>


    {{-- <nav class="flex justify-between bg-custom1 text-white px-3 py-3 items-center title-font">
        <div class="flex justify-around flex-0point4 items-center">
            <div class="logo " style="font-family: 'Patua One', cursive;">
                <span>S</span>
                <span>A</span>
                <span>N</span>
            </div>
            <div class="sign-in">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="linkNav"><i class="fas fa-sign-in-alt"></i>

                            Sign in</a>
                    @endauth
                @endif
            </div>

        </div>
        </div>
        <div class="flex min-w-500 justify-around">
            <div>
                <a href="/" class="linkNav">
                    Home
                </a>
            </div>
            <div>
                <a href="/allnews" class="linkNav">
                    All News
                </a>
            </div>
            <div>
                <a href="/contact" class="linkNav">
                    Contact
                </a>
            </div>
            <div>
                <a href="/about" class="linkNav">
                    About
                </a>
            </div>
            <div>
                <a href="/advanceSearch" class="linkNav">
                    Advance Search <i
                    class="fas fa-search"></i>
                </a>
            </div>
        </div>
        <div>
            <div class="search-section">
                <form action="/search" method="GET" class="form-inline my-2 my-lg-0">
                    <div class="relative text-gray-600 focus-within:text-gray-400">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                  </svg>                            </button>
                          </span>
                          <input type="search" name="query" class="py-2 text-sma bg-gray-100 rounded-md pl-10 focus:outline-none focus:bg-white focus:text-gray-900" placeholder="Search..." autocomplete="off">
                    </div>
                </form>
            </div>
        </div>
    </nav> --}}


                    @yield('content')



</body>

</html>
