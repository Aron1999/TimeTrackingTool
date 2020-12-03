@extends('layouts.app')

@section('content')

<all-tasks inline-template :projects="{{$projects}}" :users="{{$users}}" :tasks="{{$tasks}}"> 
    <div class="w-full">
        <div class="flex w-full justify-between">
            <div class="w-auto">
                <h1 class="text-3xl text-gray-800">Taken</h1>
            </div>
        </div>
        <div class="w-full max-w-screen-lg mt-12 relative inline-block">
            <a href="#" class="bg-blue-500 float-right rounded text-white trans px-6 py-3 ml-5 rounded-2">Mijn taken</a> 
            <a href="#" class="bg-blue-500 float-right rounded text-white trans px-6 py-3 rounded-2">Alle taken</a> 
        </div>
        <task-create  :projects="projects" :users="users" formaction="{{  action('TaskController@submit')  }}">
        </task-create>

        <div class="w-full max-w-screen-lg mt-12 relative inline-block">
            <div class="w-full rounded border-2 border-gray-200 relative inline-block">
                <task v-for="(task, i) in allTasks" :key="i" :task="task" building="{{asset('building.png')}}" calendar="{{asset('calendar.png')}}" usericon="{{asset('user.png')}}" arrowright="{{asset('arrow-right.png')}}">
                </task>
            </div>
        </div>
    </div>
</all-tasks>
@endsection
