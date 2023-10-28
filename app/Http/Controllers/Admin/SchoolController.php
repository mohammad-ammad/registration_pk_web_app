<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Province;
use App\Models\District;
use App\Models\Tehsil;
use App\Models\Cities;
use App\Models\SchoolBranches;
use DB;

class SchoolController extends Controller
{
    public function index(){
        $schools = School::join('schoolbranches','schools.school_id','schoolbranches.fk_school_id')
        ->leftjoin('subareas','schoolbranches.fk_subarea_id','subareas.subarea_id')
        ->leftjoin('areas','schoolbranches.fk_area_id','areas.area_id')
        ->leftjoin('institutestatus','institutestatus.status_id','schoolbranches.sc_br_status')
         ->join('cities','schoolbranches.fk_city_id','cities.city_id')
        ->orderBy('schoolbranches.sc_br_id','desc')
        ->get();

        return view("admin.pages.view_school")->with('schools', $schools);
    }

    public function add_view(){
        $province = Province::get();
        return view("admin.pages.add_school")->with('provinces', $province);
    }

    public function add_school(Request $request){
        $request->validate([
            'school_name' => 'required',
        ]);

        $school = new School();
        $school->school_name = $request->school_name;
        $school->save();

        return redirect()->route('admin.school.add')->with('success', 'School added successfully');
    }

    public function get_all_school_ajax(){
        $data = School::get();
        return response()->json($data);
    }

    public function get_all_districts_fk_provinces_ajax($province_id){
        $districts = District::where('fk_province_id', $province_id)->get();
        return response()->json($districts);
    }

    public function get_all_tehsils_fk_district_ajax($district_id){
        $tehsil = Tehsil::where('fk_district_id', $district_id)->get();
        return response()->json($tehsil);
    }

    public function get_all_cities_fk_tehsil_ajax($tehsil_id){
        $cities = Cities::where('fk_tehsil_id', $tehsil_id)->get();
        return response()->json($cities);
    }

    public function add_school_branch(Request $request){
        $request->validate([
            'school_name' => 'required',
        ]);

        $branch = new SchoolBranches();
        $branch->fk_school_id = $request->school_name;
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

        return redirect()->route('admin.school')->with('success', 'School added successfully');
    }

    public function edit_view($id){
        $province = Province::get();
        $school = SchoolBranches::join('schools','schools.school_id','schoolbranches.fk_school_id')
            ->leftjoin('institutestatus','schoolbranches.sc_br_status','institutestatus.status_id')
            ->leftjoin('cities','cities.city_id','schoolbranches.fk_city_id')
            ->leftjoin('tehsils','tehsils.tehsil_id','schoolbranches.fk_tehsil_id')
            ->leftjoin('districts','districts.district_id','schoolbranches.fk_district_id')
            ->leftjoin('provinces','provinces.province_id','schoolbranches.fk_province_id')
            ->find($id);
        return view("admin.pages.edit_school")->with('provinces', $province)->with('school', $school);
    }

    public function edit_school(Request $request,$id){
        $branch = SchoolBranches::find($id);
        $branch->fk_school_id = $request->school_name;
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

        $branch->update();

        return redirect()->route('admin.school')->with('success', 'School updated successfully');
    }

    public function delete_school($id, $brId){
        DB::beginTransaction();

        try {
            School::where('school_id', $id)->delete();
            SchoolBranches::where('sc_br_id', $brId)->delete();
    
            DB::commit();
            return redirect()->route('admin.school')->with('success', 'School deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.school')->with('error', 'Delete operation failed');
        }
    }
}
