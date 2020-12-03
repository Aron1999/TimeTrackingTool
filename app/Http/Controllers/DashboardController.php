<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Contact;
use App\Organisation;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $contacts = Contact::all();
        $organisations = Organisation::all();
        return view('dashboard',  [
            'contacts' => $contacts,
            'organisations' => $organisations]);

        
        // $results = DB::select( DB::raw("select version()") );
        // $mysql_version =  $results[0]->{'version()'};
        // dd($mysql_version);
        
        // return view('dashboard');


    }
}
