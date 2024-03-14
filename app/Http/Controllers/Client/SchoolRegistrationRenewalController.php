<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\SchoolRegistrationRenewal;
use Illuminate\Support\Facades\Validator;

class SchoolRegistrationRenewalController extends Controller
{
    public function school_registration_renewal(){
        return view('client.pages.school_registration_renewal');
    }

    public function school_registration_renewal_submit(Request $request){
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
        'expiredelicense' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        $expiredelicense = $request->file('expiredelicense')->store('expiredelicense', 'public');

        SchoolRegistrationRenewal::create(array_merge($request->all(), ['expiredelicense' => $expiredelicense]));

        return redirect()->back()->with('message', "Record Added Successfully");
    } catch (\Exception $e) {
        return redirect()->back()->with('error', "Please Try Again");
    }
    }
}
