<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Organisation;
use Illuminate\Http\Request;

class ContactController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('tenant.contact.index',  ['contacts' => $contacts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $organisations = Organisation::all();

        return view('tenant.contact.create', ['organisations' => $organisations]);
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
        ]);

        $organisation = Organisation::findOrFail($request->organisation_id);
        $contact = $organisation->contacts()->create($request->all());
            
 
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
        $contact = Contact::find($id);


        
        // $contact->contacts()->create([
        //     'name' => 'Aron Koedijker',
        //     'address' => 'Weg 2',
        //     'phone' => '0612345678',
        //     'email' => 'aron@beterbekend.nl',
        // ]);



        return view('tenant.contact.show', ['contact' => $contact]);
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

        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->description = $request->description;
        $contact->address = $request->address;
        $contact->zipcode = $request->zipcode;
        $contact->place = $request->place;
        $contact->phone = $request->phone;
        $contact->email = $request->email;

        $contact->save();
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
