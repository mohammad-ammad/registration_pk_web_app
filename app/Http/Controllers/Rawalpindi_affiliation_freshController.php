<?php

namespace App\Http\Controllers;

use App\Models\RwpAffiliateFormFresh;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Rawalpindi_affiliation_freshController extends Controller
{
    public function rwp_affiliation_fresh(){
        return view("client.pages.rwp_affiliation_fresh");
    }

public function rwp_affiliation_fresh_submit(Request $request){
    // Validation rules
    $rules =[
        'school_name' => 'required|string',
        'address' => 'required|string',
        'district' => 'required|string',
        'tehsil' => 'required|string',
        'reg_no' => 'required|string',
        'contact' => 'nullable|string',
        'owner_name' => 'required|string',
        'owner_contact' => 'required|string',
        'cnic' => 'required|string',
        'qualification' => 'required|string',
        'owner_email_address' => 'required|email',
        'principal_name' => 'required|string',
        'principal_contact' => 'required|string',
        'principal_cnic' => 'required|string',
        'principal_qualification' => 'required|string',
        'principal_email' => 'required|email',
        'school_level' => 'required|string',
        'gender' => 'required|string',
        'classrooms_no' => 'required|string',
        'washrooms_no' => 'required|string',
        'total_staff' => 'required|string',
        'male_staff' => 'required|string',
        'female_staff' => 'required|string',
        'non_teaching_staff' => 'required|string',
        'building' => 'required|string',
        'playground' => 'required|string',
        'laboratories' => 'required|string',
        'lab_attendent' => 'required|string',
        'which_group_affiliated' => 'required|string',
        'registered_body' => 'required|string',
        'institute_run' => 'required|string',
        'sufficient_budget' => 'required|string',
    ];

 // Validate the request
 $validator = Validator::make($request->all(), $rules);

 // Check if validation fails
 if ($validator->fails()) {

     Session::flash('danger', 'Validation failed. Please check your inputs.');
     return redirect()->back()->withErrors($validator)->withInput();
 }


 try {
     RwpAffiliateFormFresh::create($request->all());
     Session::flash('success');


     return redirect()->back();
 } catch (\Exception $e) {

     Session::flash('danger');
     return redirect()->back();
 }


}
}
