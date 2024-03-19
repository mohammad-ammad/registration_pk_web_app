<?php

namespace App\Http\Controllers\Client;

use App\Models\BuildingData;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BuildingEvaluationController extends Controller
{
    public function building_evaluation(){
        return view('client.pages.building_evaluation');
    }
    public function building_evaluation_submit(Request $request){
        $rules = [
            'schoolname' => 'required|string',
            'address' => 'required|string',
            'building_drawings' => 'required|string',
            'total_area' => 'required|string',
            'covered_area' => 'required|string',
            'stories_no' => 'nullable|string',
            'walls_thickness' => 'required|string',
            'roof_height' => 'required|string',
            'roof_type' => 'required|string',
            'no_offices' => 'required|string',
            'offices_dimensions' => 'required|string',
            'offices_covered_area' => 'required|string',
            'offices_seating_capacity' => 'required|string',
            'classroom_no' => 'required|string',
            'classroom_dimensions' => 'required|string',
            'classroom_covered_area' => 'required|string',
            'classroom_seating_capacity' => 'required|string',
            'halls_no' => 'required|string',
            'halls_dimensions' => 'required|string',
            'halls_covered_area' => 'required|string',
            'halls_seating_capacity' => 'required|string',
            'science_lab_no' => 'required|string',
            'science_lab_dimensions' => 'required|string',
            'science_lab_covered_area' => 'required|string',
            'science_lab_seating_capacity' => 'required|string',
            'no_library' => 'required|string',
            'library_dimensions' => 'required|string',
            'library_covered_area' => 'required|string',
            'library_seating_capacity' => 'required|string',
            'nowashrooms' => 'required|string',
            'student_strength' => 'required|string',
            'vantilation_system' => 'required|string',
            'Fire_Extinguishers' => 'required|string',
            'Security_Cameras' => 'required|string',
            'stairs_type' => 'required|string',
            'grill_type' => 'required|string',
            'play_area' => 'required|string',
            'captcha_answer' => 'required|numeric',
            'correct_answer' => 'required|numeric',
        ];
 // Validate the request
 $validator = Validator::make($request->all(), $rules);
// Check if validation fails
if ($validator->fails()) {
    return redirect()->back()->with('error', " Validation Failed Please Try Again");
}


    // CAPTCHA validation: Check if the user's answer matches the correct answer
    if ($request->input('captcha_answer') != $request->input('correct_answer')) {
        return redirect()->back()->with('captcha_answer' , 'Incorrect Captcha answer. Please try again.');
    }

try {
    BuildingData::create($request->all());
            //all form data in email
            $emaildata = $request->all();
            config(['mail.from.address' => 'hello@example.com']);
            config(['mail.from.name' => config('app.name')]);
            Mail::to (['test@gmail.com'])->send(new \App\Mail\Building_Evaluation_Registered($emaildata));
            config(['mail.from.address'=>null]);
            config(['mail.from.name'=>null]);
    return redirect()->back()->with('message', "Record Added Successfully");



} catch (\Exception $e) {
    Log::error($e);
    return redirect()->back()->with('error', "Please Try Again");
}
}
}
