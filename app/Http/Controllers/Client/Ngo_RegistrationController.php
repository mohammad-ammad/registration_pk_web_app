<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Models\NGO_Registartion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class Ngo_RegistrationController extends Controller
{

    public function ngo_registartion(){
        return view("client.pages.ngo_registartion");
       }

       public function ngo_registartion_submit(Request $request){
           $validatedData = $request->validate([
               'presidentName' => 'required|string',
               'presidentCnic' => 'required|string',
               'ngoName' => 'required|string',
               'head_office_address' => 'required|string',
               'organization_purpose' => 'required|string',
               'area_of_operation' => 'required|string',
               'ngo_nature' => 'required|string',
               'president_domicile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
               'establishing_date'=> 'required|date',
           ]);
           $president_domicile = $request->file('president_domicile')->store('domicile', 'public');

           $ngo_registration = NGO_Registartion::create([
            'president_name' => $validatedData['presidentName'],
            'president_cnic' => $validatedData['presidentCnic'],
            'ngo_name' => $validatedData['ngoName'],
            'head_office_address' => $validatedData['head_office_address'],
            'organization_purpose' => $validatedData['organization_purpose'],
            'area_of_operation' => $validatedData['area_of_operation'],
            'ngo_nature' => $validatedData['ngo_nature'],
            'president_domicile' =>  $president_domicile,
            'establishing_date' => $validatedData['establishing_date'],
           ]);

           return redirect()->back()->with('message', "Record Added Successfully");
}
}
