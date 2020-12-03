<?php

namespace App\Http\Controllers;

use App\Organisation;
use App\Contact;
use Illuminate\Http\Request;


class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organisations = Organisation::all();
        return view('tenant.organisation.index',  ['organisations' => $organisations]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        return view('tenant.organisation.create');
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
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'place' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'website' => 'required|url',
        ]);

        $organisation = new Organisation;
        $organisation->name = $request->name;
        $organisation->description = $request->description;
        $organisation->address = $request->address;
        $organisation->zipcode = $request->zipcode;
        $organisation->place = $request->place;
        $organisation->phone = $request->phone;
        $organisation->email = $request->email;
        $organisation->website = $request->website;


        $organisation->save();
        /*
          Add mail functionality here.
        */
        return response()->json(null, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $organisation = Organisation::find($id);


        
        // $organisation->contacts()->create([
        //     'name' => 'Aron Koedijker',
        //     'address' => 'Weg 2',
        //     'phone' => '0612345678',
        //     'email' => 'aron@beterbekend.nl',
        // ]);



        return view('tenant.organisation.show', ['organisation' => $organisation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisation $organisation)
    {
        return view('tenant.organisation.edit');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'place' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'website' => 'required|url',
        ]);

        $organisation = Organisation::find($id);
        $organisation->name = $request->name;
        $organisation->description = $request->description;
        $organisation->address = $request->address;
        $organisation->zipcode = $request->zipcode;
        $organisation->place = $request->place;
        $organisation->phone = $request->phone;
        $organisation->email = $request->email;
        $organisation->website = $request->website;


        $organisation->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisation $organisation)
    {
        //
    }
}
