@extends('layouts.app')

@section('content')


<div class="w-full">
   <div class="flex w-full justify-between">
       <div class="w-auto">
            <h1 class="text-3xl text-gray-800">Dashboard</h1>
       </div>
   </div>
   <div class="w-full relative flex flex-no-wrap">
        <div class="w-full mt-12 relative inline-block float-left mr-12">
                <p class="text-xl text-gray-800">Mijn taken</p>
                <div class="w-full rounded border-2 border-gray-200 relative inline-block mt-4" style="height: 300px;">
            
                    @foreach ($tasks as $task)
                    <task :task="{{ json_encode($task) }}" building="{{asset('building.png')}}" calendar="{{asset('calendar.png')}}" usericon="{{asset('user.png')}}" arrowright="{{asset('arrow-right.png')}}" formaction="{{  action('TaskController@update', $task->id)  }}">
                    </task>
                    @endforeach
                </div>
                <a href="tasks/all" class="cursor-pointer">
                    <div class="relative inline-block float-right mt-4 mr-2 cursor-pointer">
                        <p class="inline-block float-left mr-3 text-gray-800">Alle taken</p>
                        <img src="{{asset('arrow-right.png')}}" class="mt-1">
                    </div>
                </a>
        </div>

        <div class="w-1/2 mt-12 relative inline-block float-left">
                <p class="text-xl text-gray-800">Urenoverzicht</p>
                <div class="w-full rounded border-2 border-gray-200 relative inline-block mt-4">
                    <all-logs :logs="{{$logs}}"></all-logs>
                </div>
        </div>
        
    </div>
    <div class="w-2/5 mt-12 relative inline-block float-left -mt-6">
        <p class="text-xl text-gray-800">Projecten</p>
        <div class="w-full border-2 border-gray-200 mt-4">
            <div class="w-full flex border-b border-1 border-gray-200  rounded p-4">
                    <div class="w-20"><input type="checkbox"></div>
                    <div class="w-1/3"><label class="text-gray-500 font-medium">Name</label></div>
                    <div class="w-1/3"><label class="text-gray-500 font-medium">Oragnisations</label></div>
                    <div class="w-1/3"><label class="text-gray-500 font-medium">Tasks</label></div>
                </div>


            @foreach ($projects as $project)
            <div class="w-full flex border-b border-1 border-gray-200 rounded p-4">
                <div class="w-20"><input type="checkbox"></div>
                <div class="w-1/3">
                
                    <a href="{{ url("/projects/{$project->id}") }}" class="text-blue-500 font-medium inline-block">
                        {{ $project->name }}
                    </a>
                </div>
                <div class="w-1/3 text-gray-500">{{ $project->organisation->name }}</div>
                <div class="w-1/3 text-gray-500">{{count($project->tasks)}}</div>
            </div>
            @endforeach
        </div>
        <a href="/projects" class="cursor-pointer">
            <div class="relative inline-block float-right mt-4 mr-2 cursor-pointer">
                <p class="inline-block float-left mr-3 text-gray-800">Alle projecten</p>
                <img src="{{asset('arrow-right.png')}}" class="mt-1">
            </div>
        </a>
    </div>
</div>
@endsection
