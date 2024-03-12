<?php

namespace App\Http\Controllers;

use App\Models\BuildingData;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

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
        ];
 // Validate the request
 $validator = Validator::make($request->all(), $rules);
// Check if validation fails
if ($validator->fails()) {

    Session::flash('danger', 'Validation failed. Please check your inputs.');
    return redirect()->back()->withErrors($validator)->withInput();
}


try {
    BuildingData::create($request->all());
   // Flash success message in the session
   Session::flash('success', 'Building data submitted successfully.');


    return redirect()->back();
} catch (\Exception $e) {

    Session::flash('danger');
    return redirect()->back();
}
}
}
