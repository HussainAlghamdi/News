<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SAN</title>

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

        <link rel="stylesheet" href="{{ asset('css/app.css') }}"  type="text/css">

        <script src="https://cdn.jsdelivr.net/npm/kutty@latest/dist/alpinejs.min.js"></script>
        <!-- And then the single component -->
        <script src="https://cdn.jsdelivr.net/npm/kutty@latest/dist/dropdown.min.js"></script>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
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


            {{-- <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class=" max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" style="font-family: 'Patua One', cursive;" >
                    @yield('header')
                </div>
            </header> --}}
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>


            <!-- footer -->
    <footer class="footer bg-custom1 relative pt-1">

        <div class="container mx-auto px-6">
            <div class="mt-0 flex flex-col items-center">
                <div class="sm:w-2/3 text-center py-6">
                    <p class="text-sm  font-bold mb-2" style="color: white">
                        ??2021 Saudi Arabia News
                    </p>
                </div>
            </div>
        </div>
    </footer>
    </body>
</html>
