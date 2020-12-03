<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use App\Organisation;

use Auth;
use Carbon;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
           /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        // $organisation = DB::table('organisation')->all()
        return view('tenant.project.index',  ['projects' => $projects]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organisations = Organisation::all();
        return view('tenant.project.create', ['organisations' => $organisations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    public function submit(Request $request) {
        $validation = $this->validate($request, [
            'organisation_id' => 'integer|required',
            'name' => 'required|string',
            'deadline'  => 'date_format:Y-m-d|after:today'
        ]);

        $userId = Auth::id();
        // $deadline = Carbon::parse($request->deadline);

        $organisation = Organisation::findOrFail($request->organisation_id);
        $project = $organisation->projects()->create([

            'user_id' => $userId,
            'name' => $request->name,
            'description' => $request->description,
            'deadline' => $request->deadline,

        ]);
            
 
        return response()->json(null, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $project = Project::find($id);
        $organisations = Organisation::all();
        $tasks = Task::where('project_id', $id);
        $userId = Auth::id();

        // $project->tasks()->create([
        //     'name'  => 'testtaak',
        //     'description'  => 'dit is een test taak',
        //     'user_id'   => $userId,
        //     'contact_id'    => 1,
        // ]);



        return view('tenant.project.show', ['project' => $project, 'organisations' => $organisations, 'task' => $tasks]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        // return view('tenant.contact.edit');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $project = Project::find($id);
        $project->name = $request->name;


        $project->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
