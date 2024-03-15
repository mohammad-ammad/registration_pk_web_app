<?php

namespace App\Http\Controllers\Client;

use App\Models\Tehsil;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\CollegeRegistrationFresh;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CollegeRegistrationFreshController extends Controller
{
    public function college_registration()
    {
        $tehsils = Tehsil::get();
        $districts = District::get();
        return view('client.pages.college_registration_fresh', compact('tehsils', 'districts'));
    }
    public function college_registration_submit(Request  $request)
    {
        $rules = [
            'college_name' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'tehsil' => 'required|string|max:255',
            'uc_no' => 'required|string|max:255',
            'na_no' => 'required|string|max:255',
            'pp_no' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'gender_studying' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'shift' => 'required|in:morning,evening',
            'establishment_year' => 'required|string|max:255',
            'college_address' => 'nullable|string|max:255',
            'college_type' => 'required|in:general,trust',
            'college_email' => 'required|email|max:255',
            'registration_expiry_date' => 'required|string',
            'college_contact_no' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'owner_no' => 'required|string|max:255',
            'owner_cnic' => 'required|string|max:255',
            'principal_name' => 'required|string|max:255',
            'principal_no' => 'required|string|max:255',
            'principal_cnic' => 'required|string|max:255',
            'ownership_nature' => 'required|string|max:255',
            'male_teacher' => 'required|string|max:255',
            'female_teacher' => 'required|string|max:255',
            'college_stats' => 'required|string|max:255',
            'university_affiliation' => 'required|string|max:255',
            'board_affiliation' => 'required|string|max:255',
            'total_branches' => 'required|string|max:255',
            'total_classrooms' => 'required|string|max:255',
            'total_rooms' => 'required|string|max:255',
            'building_type' => 'required|string|max:255',
            'total_area' => 'required|string|max:255',
            'library_available' => 'required|string|max:255',
            'labs' => 'nullable|array',
            'labs.*' => 'string',
            'total_computers_p1_p2_series' => 'required|string|max:255',
            'total_computers_p3_series' => 'required|string|max:255',
            'total_computers_p4_series' => 'required|string|max:255',
            'functional_computers_p1_p2_series' => 'required|string|max:255',
            'functional_computers_p3_series' => 'required|string|max:255',
            'functional_computers_p4_series' => 'required|string|max:255',
            'admin_computers_p1_p2_series' => 'required|string|max:255',
            'admin_computers_p3_series' => 'required|string|max:255',
            'admin_computers_p4_series' => 'required|string|max:255',
            'ownership_rented_deed' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024', // 1 MB max size for image files
            'hygiene_certificate' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024', // 1 MB max size for image files
            'building_fitness_certificate' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024', // 1 MB max size for image files
            'map_college_building' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024', // 1 MB max size for image files
            'security_arrangement_certificate' => 'required|string', // Optional field
            'franchise_certificate' => 'required|string', // Optional field
            'list_of_books' => 'required|string', // Optional field
            'list_of_lab_equipments' => 'required|string', // Optional field
            'required_fees' => 'required|string', // Optional field
            'playground_permission' => 'required|string', // Optional field
            'attested_certificate' => 'required|string', // Optional field
            'disclaimer' => 'required|string', // Must agree to disclaimer
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

        $labs = implode(',', $request->input('labs', []));

            $ownership_rented_deed = $request->file('ownership_rented_deed')->store('ownership_rented_deed', 'public');
            $hygiene_certificate = $request->file('hygiene_certificate')->store('hygiene_certificate', 'public');
            $building_fitness_certificate = $request->file('building_fitness_certificate')->store('building_fitness_certificate', 'public');
            $map_college_building = $request->file('map_college_building')->store('map_college_building', 'public');

           $registration =  CollegeRegistrationFresh::create(array_merge($request->except('labs'), [
            'labs' => $labs,
                'ownership_rented_deed' => $ownership_rented_deed,
                'hygiene_certificate' => $hygiene_certificate,
                'building_fitness_certificate' => $building_fitness_certificate,
                'map_college_building' => $map_college_building,
            ]));

            $emaildata = $request->all();
            config(['mail.from.address' => 'hello@example.com']);
            config(['mail.from.name' => config('app.name')]);
            Mail::to (['test@gmail.com'])->send(new \App\Mail\College_Registration_Fresh($emaildata));
            config(['mail.from.address'=>null]);
            config(['mail.from.name'=>null]);


               // Log success message for debugging
                Log::info('Record created successfully:', $registration->toArray());



                return redirect()->back()->with('message', "Record Added Successfully");
        } catch (\Exception $e) {

              Log::error('Error creating record:', ['error' => $e->getMessage()]);
              return redirect()->back()->with('error', "Please Try Again");
        }
    }
}
