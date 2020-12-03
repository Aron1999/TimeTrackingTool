<?php

namespace App\Http\Controllers;

use App\Log;
use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $user = $request->user();
        $task = Task::findOrFail($id);
        $log = $task->logs()->create([

            'user_id'       => $user->id,
            'name'          => $request->get('name'),
            'started_at'    => Carbon::now()->timestamp,
            'ended_at'      => Carbon::now()->timestamp,
            'is_running'    => true,
       ]);
            
       $logs = $task->logs()->orderBy('created_at', 'DESC')->get();

 
        return response()->json($logs, 200);
        // return $request->user();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    public function stop(Request $request, $id)
    {
        $log = Log::findOrFail($id);

        $log->ended_at = Carbon::now()->timestamp;
        $log->is_running = false;

        $log->save();

        return response()->json($log, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        //
    }
}
