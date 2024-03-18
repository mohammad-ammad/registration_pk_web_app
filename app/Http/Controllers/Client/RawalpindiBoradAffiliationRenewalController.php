<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\RawalpindiBoardAffiliationRenewal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RawalpindiBoradAffiliationRenewalController extends Controller
{
    public function rawalpindi_affiliation_renewal (){
        return view('client.pages.rawalpindi_affiliation_renewal');
    }

    public function rawalpindi_affiliation_renewal_submit(Request $request){
          // Validation rules
    $rules = [
        'schoolname' => 'required|string',
        'address' => 'required|string',
        'ownername' => 'required|string',
        'ownercontact' => 'required|string',
        'cnic' => 'required|string',
        'qualification' => 'required|string',
        'owneremail' => 'nullable|email',
        'principalname' => 'required|string',
        'principalcontact' => 'required|string',
        'principalcnic' => 'required|string',
        'principalqualification' => 'required|string',
        'principalemail' => 'required|email',
        'schoollevel' => 'required|string',
        'gender' => 'required|string',
        'noclassrooms' => 'required|string',
        'nowashrooms' => 'required|string',
        'total_staff' => 'required|string',
        'malestaff' => 'required|string',
        'femalestaff' => 'required|string',
        'nonteachingstaff' => 'required|string',
        'building' => 'required|string',
        'class' => 'required|string',
        'fee' => 'required|string',
        'boys' => 'required|string',
        'girls' => 'required|string',
        'totalstudents' => 'required|string',
        'rawalpindi_affiliation_renewal_expiredelicense' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'captcha_answer' => 'required|numeric',
        'correct_answer' => 'required|numeric',
    ];


    $validator = Validator::make($request->all(), $rules);



    if ($validator->fails()) {

        return redirect()->back()->with('error', "Validation Failed Please Try Again");
    }

    // CAPTCHA validation: Check if the user's answer matches the correct answer
if ($request->input('captcha_answer') != $request->input('correct_answer')) {
    return redirect()->back()->with('captcha_answer' , 'Incorrect Captcha answer. Please try again.');
}


    try {
        $expiredelicense = $request->file('rawalpindi_affiliation_renewal_expiredelicense')->store('expiredelicense', 'public');

        RawalpindiBoardAffiliationRenewal::create(array_merge($request->all(), ['expiredelicense' => $expiredelicense]));
             //all form data in email
             $emaildata = $request->all();
             config(['mail.from.address' => 'hello@example.com']);
             config(['mail.from.name' => config('app.name')]);
             Mail::to (['test@gmail.com'])->send(new \App\Mail\Rawalpindi_Board_Affiliation_Renewal($emaildata));
             config(['mail.from.address'=>null]);
             config(['mail.from.name'=>null]);
        return redirect()->back()->with('message', "Record Added Successfully");
    } catch (\Exception $e) {
        Log::error('Error creating record:', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', "Please Try Again");
    }
    }
}
