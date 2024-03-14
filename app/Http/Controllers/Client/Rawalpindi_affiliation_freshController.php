<?php

namespace App\Http\Controllers\Client;

use App\Models\Tehsil;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RwpAffiliateFormFresh;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class Rawalpindi_affiliation_freshController extends Controller
{
    public function rwp_affiliation_fresh(){
        $tehsils = Tehsil::get();
        $districts = District::get();
        return view("client.pages.rwp_affiliation_fresh",compact('tehsils','districts'));
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
        'captcha_answer' => 'required|numeric',
        'correct_answer' => 'required|numeric',
    ];

 // Validate the request
 $validator = Validator::make($request->all(), $rules);

 // Check if validation fails
 if ($validator->fails()) {

    return redirect()->back()->with('error', "Validation Failed Please Check your Input");

 }

 // CAPTCHA validation: Check if the user's answer matches the correct answer
if ($request->input('captcha_answer') != $request->input('correct_answer')) {
    return redirect()->back()->with('captcha_answer' ,'Incorrect Captcha answer. Please try again.');
}


 try {
     RwpAffiliateFormFresh::create($request->all());
     return redirect()->back()->with('message', "Record Added Successfully");
 } catch (\Exception $e) {


    return redirect()->back()->with('error', "Please Try Again");
 }


}
}
