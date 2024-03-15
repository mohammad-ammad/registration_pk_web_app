<?php

namespace App\Http\Controllers\Client;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HygieneApplication;


class HygieneController extends Controller
{
    public function showForm(){
        return view('client.pages.hygiene-certificate');
    }
    public function store(Request $request){
        // Validation
        $validatedData = $request->validate([
            'institute_name' => 'required|string|max:255',
            'institute_address' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'contact_whatsapp' => 'required|string|max:255',
            'owner_email' => 'required|email|max:255',
            'school_level' => 'required|string|max:255',
            'building_type' => 'required|integer',
            'number_of_students' => 'required|integer',
            'number_of_staff_members' => 'required|integer',
            'number_of_rooms' => 'required|integer',
            'number_of_blocks' => 'required|integer',
            'classrooms_condition' => 'required|integer',
            'playground' => 'required|integer',
            'medical_facilities' => 'required|integer',
            'canteen_condition' => 'required|integer',
            'extra_curricular_activities' => 'required|string|max:255',
            'remarks' => 'required|string|max:255',
            'captcha_answer' => 'required|numeric',
            'correct_answer' => 'required|numeric',
        ]);

        $userAnswer = $request->input('captcha_answer');
        $correctAnswer = $request->input('correct_answer');


        if ($userAnswer == $correctAnswer) {

        } else {

            return redirect()->back()->with('captcha_answer','Incorrect Captcha  answer. Please try again.');
        }

        HygieneApplication::create($validatedData);


             $emaildata = $validatedData;
             config(['mail.from.address' => 'hello@example.com']);
             config(['mail.from.name' => config('app.name')]);
             Mail::to (['shamk5445@gmail.com'])->send(new \App\Mail\HygieneRegistered($emaildata));
             config(['mail.from.address'=>null]);
             config(['mail.from.name'=>null]);






        return redirect()->back()->with('message','Hygiene application submitted successfully!');
}
}
