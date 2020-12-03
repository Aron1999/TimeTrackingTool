<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="font-sans">
        
        <nav class="flex flex-wrap w-full bg-white border-gray-200 text-gray-800 border-b-2 z-10">
            <div class="w-56  inline-block border-r-2 py-5 border-gray-200 ">
                <a href="/dashboard" class="cursor-pointer">
                    <img class="w-32 mx-auto my-0 relative table" src="https://www.beterbekend.nl/wp-content/themes/beterbekend/img/beter-bekend-logo.svg" />
                </a>
            </div>


            <div class="flex-1 py-6">
                <div class="mx-8 bg-gray-light">hier komt de zoekbalk</div>
                
            </div>

                       
               
        <div class="w-auto pt-6 text-gray-800 float-right px-12">
        
            @guest
                <ul>
                    @if (Request::path() == 'register')
                        <li><a  href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @else 
                        <li><a  href="{{ __('Register') }}">{{ __('Register') }}</a></li>
                    @endif
                </ul>
            @else
                    
            <user-menu inline-template>
                <div class="flex float-right items-center relative inline-block">
                    <img src="https://cdn.internetbureaubeterbekend.nl/crm/notification.svg" class="w-5 rounded-full mr-4 cursor-pointer"/>
                    <img class="w-8 h-auto rounded-full mr-4" src="https://www.beterbekend.nl/wp-content/uploads/2018/10/BC.N.V.-Insights-2018-studio.LUSIN-Beter-Bekend-7633-edit_300x300_acf_cropped.jpg" alt="Avatar of Jonathan Reinink">
                    <div class="text-sm" v-on:click="openMenu()"  >
                        {{-- <a href="{{ route('logout') }}" 
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="text-gray-900 leading-none">{{ Auth::user()->name }}</a> --}}
                        <a class="text-gray-900 cursor-pointer leading-none">{{ Auth::user()->name }}</a>
                    </div>
                    <img src="https://cdn.internetbureaubeterbekend.nl/crm/arrow-down.svg" v-on:click="openMenu()" v-bind:class="{ 'rotate-180': rotateIcon }"  class="w-3 h-auto rounded-full ml-4 cursor-pointer"/>
                    <div v-bind:class="{ hidden: userMenu }" class="transition-custom w-56 cursor-pointer right-0 absolute border-gray-200 border-2 bg-white mt-40 rounded -mr-8 z-10">
                        <a href="/settings/user">
                            <div class="w-full border-b-2 border-gray-100 py-4 px-6 float-left inline-block">
                                <img src="https://cdn.internetbureaubeterbekend.nl/crm/settings.svg" class="w-5 rounded-full mr-4 relative inline-block float-left cursor-pointer"/>
                                <p class="relative inline-block float-left text-gray-500 hover:text-blue-500 ml-2">Instellingen</p>
                            </div>
                        </a>
                        <div class="w-full border-b-2 border-gray-100 py-4 px-6 float-left inline-block">
                            <img src="https://cdn.internetbureaubeterbekend.nl/crm/settings.svg" class="w-5 rounded-full mr-4 relative inline-block float-left cursor-pointer"/>
                            <p class="relative inline-block float-left text-gray-500 hover:text-blue-500 ml-2">Klanten</p>
                        </div>
                        <div class="w-full border-b-2 border-gray-100 py-4 px-6 float-left inline-block">
                            <img src="https://cdn.internetbureaubeterbekend.nl/crm/settings.svg" class="w-5 rounded-full mr-4 relative inline-block float-left cursor-pointer"/>
                            <p class="relative inline-block float-left text-gray-500 hover:text-blue-500 ml-2">Contacten</p>
                        </div>
                        <div class="w-full bg-blue-500 border-b-2 border-gray-100 float-left py-4 px-6 inline-block">
                            <img src="https://cdn.internetbureaubeterbekend.nl/crm/logout.svg" class="w-5 rounded-full mr-4 relative inline-block float-left cursor-pointer"/>
                            <a href="/logout" class="text-white relative inline-block float-left ml-2">Logout</a>
                        </div>
                            
                    </div>
                </div>
            </user-menu>


                    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                    </form> --}}
            @endguest
        </div>
  
                    

    </nav>


         
        <main class="w-full flex h-full">
            @auth
                @include('layouts.sidebar')
            @endauth
            <div class="flex-1 p-12">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
