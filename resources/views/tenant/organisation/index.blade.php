@extends('layouts.app')

@section('content')


<div class="w-full">
   <div class="flex w-full justify-between">
       <div class="w-auto">
            <h1 class="text-3xl text-gray-800">Organisations</h1>
       </div>
       <div class="w-flex-1 justify-end">





        
           <a href="{{ url("/organisations/create") }}" class="bg-blue-500 rounded text-white trans px-8 py-4 rounded-2">New Organisation</a> 
       </div>

   </div>

  
   <div class="w-full border-1 border-gray-200">
        <div class="w-full flex border-b border-1 border-gray-200  rounded p-4">
                <div class="w-20"><input type="checkbox"></div>
                <div class="w-1/4"><label class="text-gray-500 font-medium">Name</label></div>
                <div class="w-1/4"><label class="text-gray-500 font-medium">E-mail</label></div>
                <div class="w-1/4"><label class="text-gray-500 font-medium">Phone</label></div>
                <div class="w-1/4"><label class="text-gray-500 font-medium">Created</label></div>
            </div>


        @foreach ($organisations as $organisation)
        <div class="w-full flex border-b border-1 border-gray-200 rounded p-4">
            <div class="w-20"><input type="checkbox"></div>
            <div class="w-1/4">
               
                <a href="{{ url("/organisations/{$organisation->id}") }}" class="text-blue-500 font-medium inline-block">
                    {{ $organisation->name }}
                </a>
            </div>
            <div class="w-1/4 text-gray-500">{{ $organisation->email }}</div>
            <div class="w-1/4 text-gray-500">{{ $organisation->phone }}</div>
            <div class="w-1/4 text-gray-500">{{ $organisation->created_at }}</div>
        </div>
        @endforeach
   </div>

 
</div>
   
@endsection
