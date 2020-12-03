@extends('layouts.app')

@section('content')

            <h1 class="text-4xl text-gray-800">Dashboard</h1>
        <div class="w-2/3 relative inline-block float-left">
            <div class="relative w-full inline-block float-left mt-8">
                <a href="/organisations">
                    <div class="w-56 h-40 border-2 rounded p-6 border-gray-200 bg-white relative inline-block float-left mr-6 mb-8 cursor-pointer">
                        <div class="w-full relative inline-block">
                            {{-- <img src="https://cdn.internetbureaubeterbekend.nl/crm/phone-call-gray.svg" class="mt-1 absolute float-left h-6"/> --}}
                            <img src="https://cdn.internetbureaubeterbekend.nl/crm/portfolio-gray.svg" class="mt-1 absolute float-left h-6"/>
                            <p class="text-gray-800 flex-1 relative float-left ml-10 mt-1">Alle organisaties</p>
                        </div>
                        <p class="text-blue-500 text-5xl mt-8 leading-none w-auto relative inline-block">{{ count($organisations) }}</p>
                        <div class="float-right relative inline-block bg-green-500 rounded-lg p-2 mt-10">
                            <p class="text-white text-xs">+5%</p>
                        </div>
                    </div>
                </a>

                <a href="/contacts">
                <div class="w-56 h-40 border-2 rounded p-6 border-gray-200 bg-white relative inline-block float-left mr-6 mb-12 cursor-pointer">
                    <div class="w-full relative inline-block">
                        <img src="https://cdn.internetbureaubeterbekend.nl/crm/portfolio-gray.svg" class="mt-1 absolute float-left h-6"/>
                        <p class="text-gray-800 flex-1 relative float-left ml-10 mt-1">Alle contacten</p>
                    </div> 
                    <p class="text-blue-500 text-5xl mt-8 leading-none w-auto relative inline-block">{{ count($contacts) }}</p>
                    <div class="float-right relative inline-block bg-red-500 rounded-lg p-2 mt-10">
                        <p class="text-white text-xs">-1.5%</p>
                    </div>
                </div>
                </a>
                <div class="w-56 h-40 border-2 rounded p-6 border-gray-200 bg-white relative inline-block float-left mr-6 mb-8 cursor-pointer">
                    <div class="w-full relative inline-block">
                        <img src="https://cdn.internetbureaubeterbekend.nl/crm/portfolio-gray.svg" class="mt-1 absolute float-left h-6"/>
                        <p class="text-gray-800 flex-1 relative float-left ml-10 mt-1">Projecten</p>
                    </div>
                    <p class="text-blue-500 text-5xl mt-8 leading-none w-auto relative inline-block">36</p>
                    <div class="float-right relative inline-block bg-green-500 rounded-lg p-2 mt-10">
                        <p class="text-white text-xs">+1.5%</p>
                    </div>
                </div>
                <div class="w-56 h-40 border-2 rounded p-6 border-gray-200 bg-white relative inline-block float-left mr-6 mb-8 cursor-pointer">
                    <div class="w-full relative inline-block">
                        <img src="https://cdn.internetbureaubeterbekend.nl/crm/portfolio-gray.svg" class="mt-1 absolute float-left h-6"/>
                        <p class="text-gray-800 flex-1 relative float-left ml-10 mt-1">Taken</p>
                    </div>
                    <p class="text-blue-500 text-5xl mt-8 leading-none w-auto relative inline-block">3</p>
                    <div class="float-right relative inline-block bg-red-500 rounded-lg p-2 mt-10">
                        <p class="text-white text-xs">-11%</p>
                    </div>
                </div>
            </div>

            <div class="w-1/2 border-2 rounded border-gray-100 bg-white relative float-left inline-block mt-8">
                <div class="mr-12 w-full">
                    <form>
                        <div class="w-full relative inline-block border-b-2 border-gray-100 px-6 py-4">
                                <input type="checkbox" name="selectAll" value="all" class="float-left absolute inline-block mt-1">
                                <p class="text-gray-500 relative inline-block float-left ml-24">Bedrijf</p>
                        </div>
                        @if(count($organisations) > 0)                       
                            @foreach ($organisations as $organisation)
                                <div class="w-full relative inline-block border-b border-gray-100 px-6 py-4 float-left">
                                    <input type="checkbox" name="selectAll" value="all" class="float-left relative inline-block mt-3">    
                                    <div class="w-12 ml-10 inline-block float-left">
                                        <img src="https://cdn.internetbureaubeterbekend.nl/crm/hp-logo.png" class="mt-1 float-left h-8"/>
                                    </div>
                                    <a href="/organisations/{{ $organisation->id }}" class="cursor-pointer text-blue-500 float-left ml-2 mt-2">{{ $organisation->name }}</a>
                                </div>
                            @endforeach
                        @else
                            <div class="w-full relative inline-block border-gray-100 px-6 py-4 float-left border-b-0">
                                    {{-- <input type="checkbox" name="selectAll" value="all" class="float-left relative inline-block mt-1 float-left"> --}}
                                    <p class="text-gray-800 relative inline-block float-left ml-24">U heeft nog geen organisaties</p>
                            </div>
                        @endif
                        
                    </form>
                </div>
            </div>
            <div class="w-1/2 border-2 rounded border-gray-100 bg-white relative inline-block bg-red-500 h-56 float-left pr-12 mt-8"></div>
        </div>

            <div class="w-1/3 border-2 rounded border-gray-100 bg-white relative inline-block mt-8">
                <div class="mr-12 w-full">
                    <form>
                        <div class="w-full relative inline-block border-b-2 border-gray-100 px-6 py-4">
                            <p class="text-gray-500 relative inline-block float-left">Organisaties</p>
                        </div>
                        @if(count($organisations) > 0)                       
                            @foreach ($organisations as $organisation)
                                <div class="w-full relative inline-block border-b border-gray-100 px-6 py-4 float-left">
                                    <div class="w-12 inline-block float-left">
                                        <img src="https://cdn.internetbureaubeterbekend.nl/crm/hp-logo.png" class="mt-1 float-left h-8"/>
                                    </div>
                                    <p class="cursor-pointer text-blue-500 float-left ml-2 mt-2">{{ $organisation->name }}</p>
                                </div>
                            @endforeach
                        @else
                            <div class="w-full relative inline-block border-gray-100 px-6 py-4 float-left border-b-0">
                                    {{-- <input type="checkbox" name="selectAll" value="all" class="float-left relative inline-block mt-1 float-left"> --}}
                                    <p class="text-gray-800 relative inline-block float-left ml-24">U heeft nog geen organisaties</p>
                            </div>
                        @endif
                        
                    </form>
                </div>
            </div>
@endsection
