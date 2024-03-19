<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\FederalAffiliationRenewal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FederalBoardRegistrationRenewalController extends Controller
{
    public function federal_affiliation_renewal(){
        return view('client.pages.federal_affiliation_renewal');
    }

    public function federal_affiliation_renewal_submit(Request $request){
        $rules = [
            'schoolname' => 'required|string|max:255',
    'address' => 'required|string|max:255',
    'ownername' => 'required|string|max:255',
    'ownercontact' => 'required|string|max:255',
    'cnic' => 'required|string|max:255',
    'qualification' => 'required|string|max:255',
    'owneremail' => 'nullable|email|max:255',
    'principalname' => 'required|string|max:255',
    'principalcontact' => 'required|string|max:255',
    'principalcnic' => 'required|string|max:255',
    'principalqualification' => 'required|string|max:255',
    'principalemail' => 'nullable|email|max:255',
    'schoollevel' => 'required|string|max:255',
    'gender' => 'required|string|max:255',
    'institute_code' => 'required|string|max:255',
    'password' => 'required|integer',
    'previous_affiliation' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    'teacher_name' => 'nullable|string|max:255',
    'teacher_cnic' => 'nullable|string|max:255',
    'teacher_qualification' => 'nullable|string|max:255',
    'teacher_subject' => 'nullable|string|max:255',
    'teacher_salary' => 'nullable|string|max:255',
    'captcha_answer' => 'required|numeric',
    'correct_answer' => 'required|numeric',
        ];

            // Validate the request
            $validator = Validator::make($request->all(), $rules);
            // dd($validator);


              // Check if validation fails
        if ($validator->fails()) {


             return redirect()->back()->with('error', "Validation Failed Please Check your Input");
        }

        // CAPTCHA validation: Check if the user's answer matches the correct answer
        if ($request->input('captcha_answer') != $request->input('correct_answer')) {
            return redirect()->back()->with('captcha_answer', 'Incorrect Captcha answer. Please try again.');
        }

        try{
            $previous_affiliation = $request->file('previous_affiliation')->store('public/federal_renewal');


              FederalAffiliationRenewal::create(array_merge($request->all(), [
               'previous_affiliation' => $previous_affiliation,

            ]));
            // $emaildata = $request->all();
            // config(['mail.from.address' => 'hello@example.com']);
            // config(['mail.from.name' => config('app.name')]);
            // Mail::to (['shamk5445@gmail.com'])->send(new \App\Mail\federal_registration_renewal($emaildata));
            // config(['mail.from.address'=>null]);
            // config(['mail.from.name'=>null]);
            return redirect()->back()->with('message', "Record Added Successfully");
        }
        catch(\Exception $e){
            Log::error('Error creating record:', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', "Please Try Again");
        }
    }
}
