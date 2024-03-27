<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\FederalBoardAffiliationFresh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FederalBoradAffiliationFreshController extends Controller
{
    public function federal_affiliation()
    {
        return view('client.pages.federal_bard_affiliation_fresh');
    }

    public function federal_affiliation_submit(Request $request)
    {
        $rules = [
            'school_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'owner_contact' => 'required|string|max:255',
            'owner_cnic' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'owner_email' => 'nullable|string|max:255',
            'principal_name' => 'required|string|max:255',
            'principal_contact' => 'required|string|max:255',
            'principal_cnic' => 'required|string|max:255',
            'principal_qualification' => 'required|string|max:255',
            'principal_email' => 'nullable|string|max:255',
            'school_level' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'no_classrooms' => 'required|string',
            'no_washrooms' => 'required|string',
            'total_staff' => 'required|string',
            'male_staff' => 'required|string',
            'female_staff' => 'required|string',
            'nonteaching_staff' => 'required|string',
            'building' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'fee' => 'required|string',
            'boys' => 'required|string',
            'girls' => 'required|string',
            'total_students' => 'required|string',
            'teacher_name' => 'required|string|max:255',
            'teacher_cnic' => 'required|string|max:255',
            'teacher_qualification' => 'required|string|max:255',
            'teacher_subject' => 'required|string|max:255',
            'teacher_salary' => 'required|string',
            'registration_letter' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'building_map' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'rent_agreement' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'staff_statement' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'owner_cnic_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'contact_number_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'email_address_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'registered_certificate_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
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
            return redirect()->back()->with('captcha_answer', 'Incorrect Captcha answer. Please try again.');
        }

        try{
        // $registrationLetterPath = $request->file('registration_letter')->store('public/federal');
        // $buildingMapPath = $request->file('building_map')->store('public/federal');
        // $rentAgreementPath = $request->file('rent_agreement')->store('public/federal');
        // $staffStatementPath = $request->file('staff_statement')->store('public/federal');
        // $ownerCnicImagePath = $request->file('owner_cnic_image')->store('public/schools');
        // $contactNumberImagePath = $request->file('contact_number_image')->store('public/federal');
        // $emailAddressImagePath = $request->file('email_address_image')->store('public/federal');
        // $registeredCertificateImagePath = $request->file('registered_certificate_image')->store('public/federal');


        $registrationLetterPath = $request->file('registration_letter')->store('federal');
        $buildingMapPath = $request->file('building_map')->store('federal');
        $rentAgreementPath = $request->file('rent_agreement')->store('federal');
        $staffStatementPath = $request->file('staff_statement')->store('federal');
        $ownerCnicImagePath = $request->file('owner_cnic_image')->store('schools');
        $contactNumberImagePath = $request->file('contact_number_image')->store('federal');
        $emailAddressImagePath = $request->file('email_address_image')->store('federal');
        $registeredCertificateImagePath = $request->file('registered_certificate_image')->store('federal');


          FederalBoardAffiliationFresh::create(array_merge($request->all(), [

           'registration_letter' => $registrationLetterPath,
           'building_map'  => $buildingMapPath,
           'rent_agreement' => $rentAgreementPath,
           'staff_statement' => $staffStatementPath,
           'owner_cnic_image'=> $ownerCnicImagePath,
           'contact_number_image' => $contactNumberImagePath,
           'email_address_image' => $emailAddressImagePath,
           'registered_certificate_image' => $registeredCertificateImagePath,
        ]));

        $emaildata = $request->all();
        config(['mail.from.address' => 'hello@example.com']);
        config(['mail.from.name' => config('app.name')]);
        Mail::to (['shamk5445@gmail.com'])->send(new \App\Mail\Federal_Board_Affiliation_Fresh($emaildata));
        config(['mail.from.address'=>null]);
        config(['mail.from.name'=>null]);
        return redirect()->back()->with('message', "Record Added Successfully");

        }
        catch(\Exception $e){
            Log::error('Error creating record:', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', "Please Try Again");
        }
    }
}
