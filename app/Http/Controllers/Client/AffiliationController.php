<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Affiliation;
use App\Models\Province;
use App\Models\Cities;
use App\Models\Tehsil;
use App\Models\District;

class AffiliationController extends Controller
{
    public function showForm(){
        $province = Province::get();
        $city = Cities::get();
        $tehsil = Tehsil::get();
        $district = District::get();
        return view('client.pages.affiliation-form')->with('provinces', $province)->with('cities' , $city)->with('tehsils' , $tehsil)->with('districts' , $district);
    }
    public function submitForm(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'instituteName' => 'required|string',
            'instituteAddress' => 'required|string',
            'affiliationType' => 'required', 
            'phoneNumber' => 'required|numeric', 
            'email' => 'required|email',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'registrationType' => 'required',
            'registrationIssueDate' => 'required|date',
            'registrationExpiryDate' => 'required|date',
            'franchiseName' => 'required|string',
            'city' => 'required|string',
            'tehsil' => 'required|string',
            'district' => 'required|string',
            'province' => 'required|string',
            'group' => 'required|string', 
            'frontCnic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'backCnic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // dd($validatedData);
        $frontCnicPath = $request->file('frontCnic')->store('cnic', 'public');
        $backCnicPath = $request->file('backCnic')->store('cnic', 'public');
        //crate new form
        $Affiliation = Affiliation::create([
            'institute_name' => $validatedData['instituteName'],
            'institute_address' => $validatedData['instituteAddress'],
            'affiliation_type' => $validatedData['affiliationType'],
            'phone_number' => $validatedData['phoneNumber'],
            'email' => $validatedData['email'],
            'latitude' => $validatedData['latitude'],
            'longitude' => $validatedData['longitude'],
            'registration_type' => $validatedData['registrationType'],
            'registration_issue_date' => $validatedData['registrationIssueDate'],
            'registration_expiry_date' => $validatedData['registrationExpiryDate'],
            'franchise_name' => $validatedData['franchiseName'],
            'city' => $validatedData['city'],
            'tehsil' => $validatedData['tehsil'],
            'district' => $validatedData['district'],
            'province' => $validatedData['province'],
            'group_name' => $validatedData['group'],
            'front_cnic_path' => $frontCnicPath,
            'back_cnic_path' => $backCnicPath,
        ]);
         
        return back();
    }
    public function getAffiliationData()
    {
        $affiliation = Affiliation::all();

        return response()->json(['affiliationData' => $affiliation]);
    }
}