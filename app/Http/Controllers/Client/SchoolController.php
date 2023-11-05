<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\School;
use App\Models\SchoolBranches;
use DB;

class SchoolController extends Controller
{
    public function index(){
        $province = Province::get();
        return view('client.pages.school-registration')->with('provinces', $province);
    }

    public function store(Request $request){
        $request->validate([
            'school_name' => 'required',
        ]);

        DB::beginTransaction();

        $school = new School();
        $school->school_name = $request->school_name;
        $school->save();

        $school_id = $school->school_id;

        if($school_id)
        {
            $branch = new SchoolBranches();
            $branch->fk_school_id = $school_id;
            $branch->sc_br_name = $request->branch_name; 
            $branch->sc_br_address = $request->school_address;
            $branch->sc_br_status = $request->school_status;
            $branch->sc_br_level = $request->school_level;
            $branch->sc_br_type = $request->school_type;
            $branch->instruction_medium = $request->instruction_medium;
            $branch->no_of_boys = $request->no_of_boys;
            $branch->no_of_girls = $request->no_of_girls;
            $branch->sc_br_covered_area = $request->covered_area;
            $branch->no_of_teachers = $request->no_of_teachers;
            $branch->owner_name = $request->owner_name;
            $branch->owner_phone = $request->owner_ph_no;
            $branch->owner_email = $request->owner_email;
            $branch->principal_name = $request->principal_name;
            $branch->principal_phone = $request->principal_ph_no;
            $branch->principal_email = $request->principal_email;
            $branch->fk_province_id = $request->province;
            $branch->fk_city_id = $request->city;
            $branch->fk_tehsil_id = $request->tehsil;
            $branch->fk_district_id = $request->district;
            $branch->latitude = $request->latitude;
            $branch->longitude = $request->longitude;
            $branch->location_string = $request->location_string;
    
            $branch->save();

            DB::commit();

            return redirect()->route('client.school')->with('success', 'School registered successfully');
        }
        else {
            DB::rollBack();
            return redirect()->route('client.school')->with('error', 'Delete operation failed');
        }

    }
}
