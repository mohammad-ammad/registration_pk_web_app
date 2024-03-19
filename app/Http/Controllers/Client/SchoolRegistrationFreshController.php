<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\District;
use App\Models\Province;
use App\Models\SchoolRegistrationFresh;
use App\Models\Tehsil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SchoolRegistrationFreshController extends Controller
{
    public function school_registration_fresh(){
        $provinces = Province::all();
        $districts = District::all();
        $tehsils = Tehsil::all();
        $cities = Cities::all();
        return view('client.pages.school_registration_fresh',compact('provinces','districts','tehsils','cities'));
    }

    public function school_registration_fresh_submit(Request $request){
        $rules = [
            'school_name' => 'required|string',
            'branch_name' => 'required|string',
            'school_address' => 'required|string',
            'school_status' => 'required|string',
            'no_of_boys' => 'required|integer',
            'no_of_girls' => 'required|integer',
            'covered_area' => 'required|integer',
            'no_of_teachers' => 'required|integer',
            'school_type' => 'required|in:boys,girls,combined',
            'school_affiliated' => 'required|in:BISE Rawalpindi,FBISE',
            'instruction_medium' => 'required|in:english,urdu',
            'school_level' => 'required|in:primary,middle,secondary',
            'owner_name' => 'required|string',
            'owner_ph_no' => 'required|string',
            'owner_email' => 'required|email',
            'principal_name' => 'required|string',
            'principal_ph_no' => 'required|string',
            'principal_email' => 'required|email',
            'province_name' => 'required|string',
            'district_name' => 'required|string',
            'tehsil_name' => 'required|string',
            'city_name' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'location_string' => 'required|string',
            'captcha_answer' => 'required|numeric',
            'correct_answer' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);
        //  dd($validator);

        if($validator->fails()){
            return redirect()->back()->with('error', "Validation Failed Please Try Again");
        }

            // CAPTCHA validation: Check if the user's answer matches the correct answer
if ($request->input('captcha_answer') != $request->input('correct_answer')) {
    return redirect()->back()->with('captcha_answer' , 'Incorrect Captcha answer. Please try again.');
}


try {

         //all form data in email
         SchoolRegistrationFresh::create($request->all());
         $emaildata = $request->all();
         config(['mail.from.address' => 'hello@example.com']);
         config(['mail.from.name' => config('app.name')]);
         Mail::to (['test@gmail.com'])->send(new \App\Mail\School_Registration_Fresh($emaildata));
         config(['mail.from.address'=>null]);
         config(['mail.from.name'=>null]);
    return redirect()->back()->with('message', "Record Added Successfully");
} catch (\Exception $e) {
    Log::error('Error creating record:', ['error' => $e->getMessage()]);
    return redirect()->back()->with('error', "Please Try Again");
}
    }
}
