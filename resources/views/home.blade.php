@extends('layouts.app')
@include('layouts.sidebar')

@section('content')
    <div class="relative w-full pl-56 h-56 z-0">
        <div class="pt-40 pl-24">
            <h1 class="text-4xl text-gray-moondark">Dashboard</h1>
            <div class="w-full relative inline-block mt-8">
                <div class="w-auto border-2 rounded p-6 border-gray-light bg-white relative inline-block float-left mr-12 mb-12 cursor-pointer">
                    <div class="w-full relative inline-block">
                        <img src="https://cdn.internetbureaubeterbekend.nl/crm/phone-call-gray.svg" class="mt-1 absolute float-left h-6"/>
                        <p class="text-gray-moondark relative float-left ml-10 mt-1">Alle contacten</p>
                    </div>
                    <p class="text-blue-500 text-5xl mt-8 leading-none w-auto relative inline-block">12</p>
                    <div class="float-right relative inline-block bg-green-medium rounded-lg p-2 mt-10">
                        <p class="text-white text-xs">+5%</p>
                    </div>
                </div>
                <div class="w-auto h-40 border-2 rounded p-6 border-gray-light bg-white relative inline-block float-left mr-12 mb-12 cursor-pointer">
                    <div class="w-full relative inline-block">
                        <img src="https://cdn.internetbureaubeterbekend.nl/crm/portfolio-gray.svg" class="mt-1 absolute float-left h-6"/>
                        <p class="text-gray-moondark relative float-left ml-10 mt-1">Alle Klanten</p>
                    </div>
                    <p class="text-blue-500 text-5xl mt-8 leading-none w-auto relative inline-block">219</p>
                    <div class="float-right relative inline-block bg-red-medium rounded-lg p-2 mt-10">
                        <p class="text-white text-xs">-1.5%</p>
                    </div>
                </div>
                <div class="w-auto h-40 border-2 rounded p-6 border-gray-light bg-white relative inline-block float-left mr-12 mb-12 cursor-pointer">
                    <div class="w-full relative inline-block">
                        <img src="https://cdn.internetbureaubeterbekend.nl/crm/portfolio-gray.svg" class="mt-1 absolute float-left h-6"/>
                        <p class="text-gray-moondark relative float-left ml-10 mt-1">E-mails</p>
                    </div>
                    <p class="text-blue-500 text-5xl mt-8 leading-none w-auto relative inline-block">6</p>
                    <div class="float-right relative inline-block bg-green-medium rounded-lg p-2 mt-10">
                        <p class="text-white text-xs">+10%</p>
                    </div>
                </div>
                <div class="w-auto h-40 border-2 rounded p-6 border-gray-light bg-white relative inline-block float-left mr-12 mb-12 cursor-pointer">
                    <div class="w-full relative inline-block">
                        <img src="https://cdn.internetbureaubeterbekend.nl/crm/portfolio-gray.svg" class="mt-1 absolute float-left h-6"/>
                        <p class="text-gray-moondark relative float-left ml-10 mt-1">Projecten</p>
                    </div>
                    <p class="text-blue-500 text-5xl mt-8 leading-none w-auto relative inline-block">36</p>
                    <div class="float-right relative inline-block bg-green-medium rounded-lg p-2 mt-10">
                        <p class="text-white text-xs">+1.5%</p>
                    </div>
                </div>
                <div class="w-auto h-40 border-2 rounded p-6 border-gray-light bg-white relative inline-block float-left mr-12 mb-12 cursor-pointer">
                    <div class="w-full relative inline-block">
                        <img src="https://cdn.internetbureaubeterbekend.nl/crm/portfolio-gray.svg" class="mt-1 absolute float-left h-6"/>
                        <p class="text-gray-moondark relative float-left ml-10 mt-1">Alle Klanten</p>
                    </div>
                    <p class="text-blue-500 text-5xl mt-8 leading-none w-auto relative inline-block">78</p>
                    <div class="float-right relative inline-block bg-red-medium rounded-lg p-2 mt-10">
                        <p class="text-white text-xs">-11%</p>
                    </div>
                </div>
            </div>
            <div class="w-1/3 border-2 rounded border-gray-light bg-white relative inline-block float-left mr-12 mt-6 cursor-pointer">
                <form>
                    <div class="w-full relative inline-block border-b-2 border-gray-100 p-6">
                        <input type="checkbox" name="selectAll" value="all" class="float-left relative inline-block mt-1">
                        <p class="text-gray-100 relative inline-block float-left ml-24">Bedrijf</p>
                    </div>
                    <div class="w-full relative inline-block border-b border-gray-100 p-6">
                        <input type="checkbox" name="selectAll" value="all" class="float-left relative inline-block mt-1">
                        <p class="text-blue-light relative inline-block float-left ml-24">Amazon</p>
                    </div>
                    <div class="w-full relative inline-block border-b border-gray-100 p-6">
                        <input type="checkbox" name="selectAll" value="all" class="float-left relative inline-block mt-1">
                        <p class="text-blue-light relative inline-block float-left ml-24">Google</p>
                    </div>
                    <div class="w-full relative inline-block border-b border-gray-100 p-6">
                        <input type="checkbox" name="selectAll" value="all" class="float-left relative inline-block mt-1">
                        <p class="text-blue-light relative inline-block float-left ml-24">Hewlett Packard</p>
                    </div>
                    <div class="w-full relative inline-block border-b border-gray-100 p-6">
                        <input type="checkbox" name="selectAll" value="all" class="float-left relative inline-block mt-1">
                        <p class="text-blue-light relative inline-block float-left ml-24">Bedrijf</p>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
