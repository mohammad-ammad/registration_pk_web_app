<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Affiliation;

class AffiliationController extends Controller
{
    public function showForm(){
        $affiliationData = Affiliation::all();
        return view('client.affiliation-form',['affiliationData' => $affiliationData]);
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
        Affiliation::create([
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
        $id = $request->input('id');
        $affiliationData = $this->getAffiliationData($id);
        return response()->json($affiliationData);
    }
    protected function getAffiliationData($id)
    {
        $affiliation = Affiliation::find($id);

        if (!$affiliation) {
            return ['error' => 'Affiliation not found'];
        }

        $data = [
            'institute_name' => $affiliation->institute_name,
            'institute_address' => $affiliation->institute_address,
            'affiliation_type' => $affiliation->affiliation_type,
            'phone_number' => $affiliation->phone_number,
            'email' => $affiliation->email,
            'latitude' => $affiliation->latitude,
            'longitude' => $affiliation->longitude,
            'registration_type' => $affiliation->registration_type,
            'registration_issue_date' => $affiliation->registration_issue_date,
            'registration_expiry_date' => $affiliation->registration_expiry_date,
            'franchise_name' => $affiliation->franchise_name,
            'city' => $affiliation->city,
            'tehsil' => $affiliation->tehsil,
            'district' => $affiliation->district,
            'province' => $affiliation->province,
            'group_name' => $affiliation->group_name,
            'front_cnic_path' => $affiliation->front_cnic_path,
            'back_cnic_path' => $affiliation->back_cnic_path,
        ];

        return $data;
    }
}
