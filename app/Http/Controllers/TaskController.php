<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use App\User;
use App\Log;
use App\Organisation;

use Auth;
use Carbon\Carbon;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $yesterday = Carbon::yesterday();
        $projects = Project::take(4)->get();
        $tasks = Task::where('deadline', '>', $yesterday)->orderBy('deadline', 'ASC')->with('project')->with('logs')->where('user_id', '=', $user_id)->take(4)->get();
        $users = User::all();
        $ldate = date('Y-m-d');
        $logs = Log::whereDate('created_at', $ldate)->get();

        return view('tenant.task.dashboard',['projects' => $projects, 'tasks' => $tasks, 'users' => $users, 'logs' => $logs]);
    }

    public function all()
    {
        $projects = Project::all();
        $tasks = Task::with([
            'project' => function ($query) {
                $query->orderBy('created_at', 'desc');
            },
            'logs' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }
        ])->orderBy('deadline', 'ASC')->get();     
        
        $users = User::all();

        return view('tenant.task.all',['projects' => $projects, 'tasks' => $tasks, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    // public function submit(Request $request) {
    //     $validation = $this->validate($request, [
    //         'name' => 'string|required',
    //         'project_id' => 'integer|required',
    //         'user_id' => 'integer|required',
    //         'deadline'  => 'date_format:Y-m-d|after:today|required',
    //     ]);

    //     // $userId = Auth::id();
    //     $project_id = $request->get('project_id');
    //     $user_id = $request->get('user_id');
    //     $project = Project::findOrFail($project_id);
    //     $task = $project->tasks()->create([

    //         'user_id' => $user_id,
    //         'name' => $request->get('name'),
    //         'deadline' => $request->get('deadline'),
    //         'contact_id' => 1,
    //         // 'contact_id' => 1,
    //         'completed' => true
    //         // 'description' => $request->description,
    //         // 'deadline' => $request->deadline,

    //    ]);
            
 
    //     return response()->json($user_id, 200);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validation = $this->validate($request, [
        'name' => 'string|required',
        'project_id' => 'integer|required',
        'user_id' => 'integer|required',
        'deadline'  => 'date_format:Y-m-d|required',
    ]);

    // $userId = Auth::id();
    $project_id = $request->get('project_id');
    $user_id = $request->get('user_id');
    $project = Project::findOrFail($project_id);
    $task = $project->tasks()->create([

        'user_id' => $user_id,
        'name' => $request->get('name'),
        'deadline' => $request->get('deadline'),
        'contact_id' => 2,
        // 'contact_id' => 1,
        'completed' => true
        // 'description' => $request->description,
        // 'deadline' => $request->deadline,
   ]);
        
        $tasks = Task::with([
            'project' => function ($query) {
                $query->orderBy('created_at', 'desc');
            },
            'logs' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }
        ])->orderBy('deadline', 'ASC')->get();     

 
        return response()->json($tasks, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //    $project = Project::findOrFail($project_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd('test');
        // $validation = $this->validate($request, [
        //     'name' => 'string|required',
        // ]);

        $task = Task::find($id);
        $task->name = $request->name;
        $task->description = $request->description;

        $task->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
