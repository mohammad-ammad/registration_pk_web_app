<?php

namespace App\Http\Controllers;

use App\Models\SchoolRegistrationRenewal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

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
    ];


    $validator = Validator::make($request->all(), $rules);


    if ($validator->fails()) {

        Session::flash('danger');


        return redirect()->back()->withErrors($validator)->withInput();
    }

    // If validation passes, insert the data into the database
    try {
        $expiredelicense = $request->file('expiredelicense')->store('expiredelicense', 'public');

        SchoolRegistrationRenewal::create(array_merge($request->all(), ['expiredelicense' => $expiredelicense]));

        // Flash success message in the session
        Session::flash('success');

        // Redirect back with success message
        return redirect()->back();
    } catch (\Exception $e) {
        Session::flash('danger');
        return redirect()->back();
    }
    }
}
