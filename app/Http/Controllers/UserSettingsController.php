<?php

namespace App\Http\Controllers;

use App\UserSettings;
use App\User;
use Auth; 
use Illuminate\Http\Request;

class UserSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('usersettings.blade');
        $user = Auth::user();
        return view('user-settings',  ['user' => $user]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserSettings  $userSettings
     * @return \Illuminate\Http\Response
     */
    public function show(UserSettings $userSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserSettings  $userSettings
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSettings $userSettings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserSettings  $userSettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        // $contact->description = $request->description;
        // $contact->address = $request->address;
        // $contact->zipcode = $request->zipcode;
        // $contact->place = $request->place;
        // $contact->phone = $request->phone;
        $user->email = $request->email;

        $user->save();

        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserSettings  $userSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSettings $userSettings)
    {
        //
    }
}
