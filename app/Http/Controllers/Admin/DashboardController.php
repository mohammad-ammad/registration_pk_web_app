<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BuildingData;
use App\Models\Cities;
use App\Models\CollegeRegistrationFresh;
use App\Models\CollegeRegistrationRenewal;
use Illuminate\Http\Request;
use DB;
use App\Models\School;
use App\Models\Tehsil;
use App\Models\Province;
use App\Models\District;
use App\Models\FederalAffiliationRenewal;
use App\Models\FederalBoardAffiliationFresh;
use App\Models\HygieneApplication;
use App\Models\NGO_Registartion;
use App\Models\RawalpindiBoardAffiliationRenewal;
use App\Models\RwpAffiliateFormFresh;
use App\Models\SchoolRegistrationFresh;
use App\Models\SchoolRegistrationRenewal;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(Request $request ){
        $query = $request->query('query');
        $tehsil_query = $request->query('tehsil');
        $province_query = $request->query('province');

        $tehsil_school_primary = 0;
        $tehsil_school_middle = 0;
        $tehsil_school_secondary = 0;

        $province_school_primary = 0;
        $province_school_middle = 0;
        $province_school_secondary = 0;

        $sc_count = DB::table('schoolbranches')->count('sc_br_id');
        $sc_re_count = DB::table('schoolbranches')->where('sc_br_status','1')->count('sc_br_id');
        $sc_ure_count = DB::table('schoolbranches')->where('sc_br_status','2')->count('sc_br_id');
        $sc_up_count = DB::table('schoolbranches')->where('sc_br_status','3')->count('sc_br_id');
        $sc_primary_count = DB::table('schoolbranches')->where('sc_br_level','primary')->count('sc_br_id');
        $sc_elementary_count = DB::table('schoolbranches')->where('sc_br_level','middle')->count('sc_br_id');
        $sc_secondary_count = DB::table('schoolbranches')->where('sc_br_level','secondary')->count('sc_br_id');
        $sc_bise_count = DB::table('schoolbranches')->where('sc_br_affiliated','BISE')->count('sc_br_id');
        $sc_fbise_count = DB::table('schoolbranches')->where('sc_br_affiliated','FBISE')->count('sc_br_id');
        $sc_boys_count = DB::table('schoolbranches')->where('sc_br_type','boys')->count('sc_br_id');
        $sc_girls_count = DB::table('schoolbranches')->where('sc_br_type','girls')->count('sc_br_id');
        $sc_co_count = DB::table('schoolbranches')->where('sc_br_type','combined')->count('sc_br_id');
        $school_registration_renewal = SchoolRegistrationRenewal::count();
        $school_registration_fresh = SchoolRegistrationFresh::count();
        $federal_board_affiliation_fresh = FederalBoardAffiliationFresh::count();
        $federal_board_affiliation_renewal = FederalAffiliationRenewal::count();
        $rawalpindi_affiliation_fresh = RwpAffiliateFormFresh::count();
        $rawalpindi_affiliation_renewal = RawalpindiBoardAffiliationRenewal::count();
        $college_registration_fresh = CollegeRegistrationFresh::count();
        $college_registration_renewal = CollegeRegistrationRenewal::count();
        $hygeine_certificate = HygieneApplication::count();
        $building_certificate = BuildingData::count();
        $ngo_registration = NGO_Registartion::count();




        $tehsils = Tehsil::where('status',1)->get();
        $provinces = Province::get();

        if ($query) {
            $statusMap = [
                'registered' => 1,
                'unregistered' => 2,
                'underprocess' => 3,
            ];

            $val = $statusMap[$query] ?? 1;

            $schools = School::join('schoolbranches','schools.school_id','schoolbranches.fk_school_id')
                ->leftjoin('subareas','schoolbranches.fk_subarea_id','subareas.subarea_id')
                ->leftjoin('areas','schoolbranches.fk_area_id','areas.area_id')
                ->leftjoin('institutestatus','institutestatus.status_id','schoolbranches.sc_br_status')
                ->join('cities','schoolbranches.fk_city_id','cities.city_id')
                ->where('schoolbranches.sc_br_status', $val)
                ->orderBy('schoolbranches.sc_br_id','desc')
                ->take(10)
                ->get();
        }
        else
        {
            $schools = School::join('schoolbranches','schools.school_id','schoolbranches.fk_school_id')
                ->leftjoin('subareas','schoolbranches.fk_subarea_id','subareas.subarea_id')
                ->leftjoin('areas','schoolbranches.fk_area_id','areas.area_id')
                ->leftjoin('institutestatus','institutestatus.status_id','schoolbranches.sc_br_status')
                ->join('cities','schoolbranches.fk_city_id','cities.city_id')
                ->orderBy('schoolbranches.sc_br_id','desc')
                ->take(10)
                ->get();
        }

        if($tehsil_query)
        {
            $tehsil_school_primary = DB::table('schoolbranches')->where('fk_tehsil_id',$tehsil_query)->where('sc_br_level','primary')->count('sc_br_id');
            $tehsil_school_middle = DB::table('schoolbranches')->where('fk_tehsil_id',$tehsil_query)->where('sc_br_level','middle')->count('sc_br_id');
            $tehsil_school_secondary = DB::table('schoolbranches')->where('fk_tehsil_id',$tehsil_query)->where('sc_br_level','secondary')->count('sc_br_id');
        }

        if($province_query)
        {
            $province_school_primary = DB::table('schoolbranches')->where('fk_province_id',$province_query)->where('sc_br_level','primary')->count('sc_br_id');
            $province_school_middle = DB::table('schoolbranches')->where('fk_province_id',$province_query)->where('sc_br_level','middle')->count('sc_br_id');
            $province_school_secondary = DB::table('schoolbranches')->where('fk_province_id',$province_query)->where('sc_br_level','secondary')->count('sc_br_id');
        }


        return view('admin.pages.dashboard',compact('school_registration_renewal','school_registration_fresh','federal_board_affiliation_fresh',
        'rawalpindi_affiliation_fresh','federal_board_affiliation_renewal','rawalpindi_affiliation_renewal','college_registration_fresh','college_registration_renewal','hygeine_certificate','building_certificate'
        ,'ngo_registration'))
        ->with('sc_count',$sc_count)
        ->with('sc_re_count',$sc_re_count)
        ->with('sc_ure_count',$sc_ure_count)
        ->with('sc_up_count',$sc_up_count)
        ->with('schools',$schools)
        ->with('tehsils',$tehsils)
        ->with('provinces',$provinces)
        ->with('tehsil_school_primary',$tehsil_school_primary)
        ->with('tehsil_school_middle',$tehsil_school_middle)
        ->with('tehsil_school_secondary',$tehsil_school_secondary)
        ->with('province_school_primary',$province_school_primary)
        ->with('province_school_middle',$province_school_middle)
        ->with('province_school_secondary',$province_school_secondary)
        ->with('province_query',$province_query)
        ->with('tehsil_query',$tehsil_query)
        ->with('sc_primary_count',$sc_primary_count)
        ->with('sc_elementary_count',$sc_elementary_count)
        ->with('sc_secondary_count',$sc_secondary_count)
        ->with('sc_bise_count',$sc_bise_count)
        ->with('sc_fbise_count',$sc_fbise_count)
        ->with('sc_boys_count',$sc_boys_count)
        ->with('sc_girls_count',$sc_girls_count)
        ->with('sc_co_count',$sc_co_count);
    }

    public function get_schools_by_level_ajax($level){
        $schools = School::join('schoolbranches','schools.school_id','schoolbranches.fk_school_id')
        ->leftjoin('institutestatus','institutestatus.status_id','schoolbranches.sc_br_status')
        ->where('schoolbranches.sc_br_level', $level)
        ->orderBy('schoolbranches.sc_br_id','desc')
        ->get();
        return response()->json($schools);
    }

    public function get_schools_by_affiliated_ajax($affiliated){
        $schools = School::join('schoolbranches','schools.school_id','schoolbranches.fk_school_id')
        ->leftjoin('institutestatus','institutestatus.status_id','schoolbranches.sc_br_status')
        ->where('schoolbranches.sc_br_affiliated', $affiliated)
        ->orderBy('schoolbranches.sc_br_id','desc')
        ->get();
        return response()->json($schools);
    }

    public function get_schools_by_type_ajax($type){
        $schools = School::join('schoolbranches','schools.school_id','schoolbranches.fk_school_id')
        ->leftjoin('institutestatus','institutestatus.status_id','schoolbranches.sc_br_status')
        ->where('schoolbranches.sc_br_type', $type)
        ->orderBy('schoolbranches.sc_br_id','desc')
        ->get();
        return response()->json($schools);
    }

    public function get_master_search_by_sr_ajax(Request $request){
        $sr = $request->query('sr');
        $sc_status = $request->query('sc_status');
        $sc_level = $request->query('sc_level');
        $sc_af = $request->query('sc_af');

        $query = School::join('schoolbranches','schools.school_id','schoolbranches.fk_school_id')
        ->leftjoin('institutestatus','institutestatus.status_id','schoolbranches.sc_br_status')
        ->orderBy('schoolbranches.sc_br_id','desc');

        if($sr !== null){
            $query->where('schoolbranches.sc_br_emi_no', $sr);
        }

        if ($sc_status !== null) {
            $query->where('schoolbranches.sc_br_status', $sc_status);
        }

        if ($sc_level !== null) {
            $query->where('schoolbranches.sc_br_level', $sc_level);
        }

        if ($sc_af !== null) {
            $query->where('schoolbranches.sc_br_affiliated', $sc_af);
        }

        $schools = $query->get();

        return response()->json($schools);

    }

    public function get_master_search_by_province_list_ajax(){
        $data = Province::get();
        return response()->json($data);
    }

    public function get_master_search_by_pr_ajax(Request $request){
        $pr = $request->query('pr');
        $sc_status = $request->query('sc_status');
        $sc_level = $request->query('sc_level');
        $sc_af = $request->query('sc_af');

        $query = School::join('schoolbranches','schools.school_id','schoolbranches.fk_school_id')
        ->leftjoin('institutestatus','institutestatus.status_id','schoolbranches.sc_br_status')
        ->orderBy('schoolbranches.sc_br_id','desc');

        if($pr !== null){
            $query->where('schoolbranches.fk_province_id', $pr);
        }

        if ($sc_status !== null) {
            $query->where('schoolbranches.sc_br_status', $sc_status);
        }

        if ($sc_level !== null) {
            $query->where('schoolbranches.sc_br_level', $sc_level);
        }

        if ($sc_af !== null) {
            $query->where('schoolbranches.sc_br_affiliated', $sc_af);
        }

        $schools = $query->get();

        return response()->json($schools);
    }

    public function get_master_search_by_district_list_ajax(){
        $data = District::get();
        return response()->json($data);
    }

    public function get_master_search_by_tehsil_list_ajax(){
        $data = Tehsil::get();
        return response()->json($data);
    }

    public function get_master_search_by_ds_ajax(Request $request){
        $ds = $request->query('ds');
        $sc_status = $request->query('sc_status');
        $sc_level = $request->query('sc_level');
        $sc_af = $request->query('sc_af');

        $query = School::join('schoolbranches','schools.school_id','schoolbranches.fk_school_id')
        ->leftjoin('institutestatus','institutestatus.status_id','schoolbranches.sc_br_status')
        ->orderBy('schoolbranches.sc_br_id','desc');

        if($ds !== null){
            $query->where('schoolbranches.fk_district_id', $ds);
        }

        if ($sc_status !== null) {
            $query->where('schoolbranches.sc_br_status', $sc_status);
        }

        if ($sc_level !== null) {
            $query->where('schoolbranches.sc_br_level', $sc_level);
        }

        if ($sc_af !== null) {
            $query->where('schoolbranches.sc_br_affiliated', $sc_af);
        }

        $schools = $query->get();

        return response()->json($schools);
    }

    public function get_master_search_by_ts_ajax(Request $request){
        $ts = $request->query('ts');
        $sc_status = $request->query('sc_status');
        $sc_level = $request->query('sc_level');
        $sc_af = $request->query('sc_af');

        $query = School::join('schoolbranches','schools.school_id','schoolbranches.fk_school_id')
        ->leftjoin('institutestatus','institutestatus.status_id','schoolbranches.sc_br_status')
        ->orderBy('schoolbranches.sc_br_id','desc');

        if($ts !== null){
            $query->where('schoolbranches.	fk_tehsil_id', $ts);
        }

        if ($sc_status !== null) {
            $query->where('schoolbranches.sc_br_status', $sc_status);
        }

        if ($sc_level !== null) {
            $query->where('schoolbranches.sc_br_level', $sc_level);
        }

        if ($sc_af !== null) {
            $query->where('schoolbranches.sc_br_affiliated', $sc_af);
        }

        $schools = $query->get();

        return response()->json($schools);
    }




    //  Client Side Buttons Admin Functions

    public function get_school_registration_renewal(){
         $info = SchoolRegistrationRenewal::get();
          return response()->json($info);


    }

    public function school_registration_renewal_update(Request $request , $id){
        $school = SchoolRegistrationRenewal::findOrFail($id);
        return view('admin.pages.edit_school_registration_renewal',compact('school'));
    }

    public function school_registration_renewal_edit(Request $request , $id){
        try {
            // Find the school registration renewal record by ID
            $school = SchoolRegistrationRenewal::findOrFail($id);

            // Update the fields from the form data
            $school->update([
                'schoolname' => $request->input('schoolname'),
                'address' => $request->input('address'),
                'ownername' => $request->input('ownername'),
                'ownercontact' => $request->input('ownercontact'),
                'cnic' => $request->input('cnic'),
                'qualification' => $request->input('qualification'),
                'owneremail' => $request->input('owneremail'),
                'principalname' => $request->input('principalname'),
                'principalcontact' => $request->input('principalcontact'),
                'principalcnic' => $request->input('principalcnic'),
                'principalqualification' => $request->input('principalqualification'),
                'principalemail' => $request->input('principalemail'),
                'schoollevel' => $request->input('schoollevel'),
                'gender' => $request->input('gender'),
                'noclassrooms' => $request->input('noclassrooms'),
                'nowashrooms' => $request->input('nowashrooms'),
                'total_staff' => $request->input('total_staff'),
                'malestaff' => $request->input('malestaff'),
                'femalestaff' => $request->input('femalestaff'),
                'nonteachingstaff' => $request->input('nonteachingstaff'),
                'building' => $request->input('building'),
                'class' => $request->input('class'),
                'fee' => $request->input('fee'),
                'boys' => $request->input('boys'),
                'girls' => $request->input('girls'),
                'totalstudents' => $request->input('totalstudents'),
            ]);

            // Check if a new image file is uploaded
            if ($request->hasFile('expiredelicense')) {
                // Delete the previous image file
                Storage::delete($school->expiredelicense);

                // Store the new image file
                $expiredelicense = $request->file('expiredelicense')->store('expiredelicense', 'public');
                $school->update(['expiredelicense' => $expiredelicense]);
            }

            // Redirect back with success message
            return redirect()->back()->with('message', "Record Updated Successfully");
        } catch (\Exception $e) {
            Log::error();
            return redirect()->back()->with('error', "Error updating record: " . $e->getMessage());
        }

    }

    // School registration Fesh controller code

    public function get_school_registration_fresh(){
        try{
            $fresh_info = SchoolRegistrationFresh::get();
             return response()->json($fresh_info);

        }
        catch(\Exception $e){
            Log::error('Error creating record:', ['error' => $e->getMessage()]);
        }


   }

   public function get_school_registration_fresh_edit(Request $request , $id){
    $school = SchoolRegistrationFresh::findOrFail($id);
    $provinces  = Province::all();
    $districts = District::all();
    $tehsils = Tehsil::all();
    $cities = Cities::all();

    return view('admin.pages.edit_school_registration_fresh',compact('school','provinces','districts','cities','tehsils'));
}

public function get_school_registration_fresh_update(Request $request , $id){

           $school = SchoolRegistrationFresh::findOrFail($id);



 try{

    // Update the fields from the form data
    $school->update([
        'school_name' => $request->input('school_name'),
        'branch_name' => $request->input('branch_name'),
        'school_address' => $request->input('school_address'),
        'school_status' => $request->input('school_status'),
        'no_of_boys' => $request->input('no_of_boys'),
        'no_of_girls' => $request->input('no_of_girls'),
        'covered_area' => $request->input('covered_area'),
        'no_of_teachers' => $request->input('no_of_teachers'),
        'school_type' => $request->input('school_type'),
        'school_affiliated' => $request->input('school_affiliated'),
        'instruction_medium' => $request->input('instruction_medium'),
        'school_level' => $request->input('school_level'),
        'owner_name' => $request->input('owner_name'),
        'owner_ph_no' => $request->input('owner_ph_no'),
        'owner_email' => $request->input('owner_email'),
        'principal_name' => $request->input('principal_name'),
        'principal_ph_no' => $request->input('principal_ph_no'),
        'principal_email' => $request->input('principal_email'),
        'province_name' => $request->input('province_name'),
        'district_name' => $request->input('district_name'),
        'tehsil_name' => $request->input('tehsil_name'),
        'city_name' => $request->input('city_name'),
        'latitude' => $request->input('latitude'),
        'longitude' => $request->input('longitude'),
        'location_string' => $request->input('location_string'),
    ]);

    // $school->update();
    return redirect()->back()->with('message', 'Record updated successfully');

 }
 catch(\Exception $e){
    Log::error('Error creating record:', ['error' => $e->getMessage()]);
    return redirect()->back()->with('error', "Error updating record: " . $e->getMessage());
 }
}

// Federal Affiliation code

public function federal_affiliation_fresh(){
    $federal = FederalBoardAffiliationFresh::get();
    return response()->json($federal);

}
public function federal_affiliation_fresh_edit(Request $request ,$id){
    $federal = FederalBoardAffiliationFresh::findorFail($id);

    return view ('admin.pages.edit_federal_affiliation_fresh',compact('federal'));
    // return response()->json($federal);

}

public function federal_affiliation_fresh_update(Request $request , $id){
    $federal = FederalBoardAffiliationFresh::findorFail($id);

   try{
     $federal->update([
        'school_name' => $request->input('school_name'),
        'address' => $request->input('address'),
        'owner_name' => $request->input('owner_name'),
        'owner_contact' => $request->input('owner_contact'),
        'owner_cnic' => $request->input('owner_cnic'),
        'qualification' => $request->input('qualification'),
        'owner_email' => $request->input('owner_email'),
        'principal_name' => $request->input('principal_name'),
        'principal_contact' => $request->input('principal_contact'),
        'principal_cnic' => $request->input('principal_cnic'),
        'principal_qualification' => $request->input('principal_qualification'),
        'principal_email' => $request->input('principal_email'),
        'school_level' => $request->input('school_level'),
        'gender' => $request->input('gender'),
        'no_classrooms' => $request->input('no_classrooms'),
        'no_washrooms' => $request->input('no_washrooms'),
        'total_staff' => $request->input('total_staff'),
        'male_staff' => $request->input('male_staff'),
        'female_staff' => $request->input('female_staff'),
        'nonteaching_staff' => $request->input('nonteaching_staff'),
        'building' => $request->input('building'),
        'class' => $request->input('class'),
        'fee' => $request->input('fee'),
        'boys' => $request->input('boys'),
        'girls' => $request->input('girls'),
        'total_students' => $request->input('total_students'),
        'teacher_name' => $request->input('teacher_name'),
        'teacher_cnic' => $request->input('teacher_cnic'),
        'teacher_qualification' => $request->input('teacher_qualification'),
        'teacher_subject' => $request->input('teacher_subject'),
        'teacher_salary' => $request->input('teacher_salary'),
        // Handle file uploads separately
    ]);
    // $federal->update();
    return redirect()->back()->with('message', 'Record updated successfully');

}
catch(Exception $e){
    Log::error('Error creating record:', ['error' => $e->getMessage()]);
    return redirect()->back()->with('error', "Error updating record: " . $e->getMessage());
}

}

// Rawalpinid Affiliation Fresh
public function rawalpindi_affiliation_fresh(){
    $rawalpindi = RwpAffiliateFormFresh::get();
    return response()->json($rawalpindi);
}

public function rawalpindi_affiliation_fresh_edit(Request $request , $id){
    $rawalpindi = RwpAffiliateFormFresh::findorFail($id);
    $districts = District::all();
    $tehsils = Tehsil::all();
    return view('admin.pages.edit_rawalpindi_affiliation_fresh',compact('rawalpindi','districts','tehsils'));
}

public function rawalpindi_affiliation_fresh_update(request $request , $id){
    $rawalpindi = RwpAffiliateFormFresh::findorFail($id);
    try{
        // Validate the incoming request data
        $rawalpindi->update([
            'school_name' => $request->input('school_name'),
            'address' => $request->input('address'),
            'district' => $request->input('district'),
            'tehsil' => $request->input('tehsil'),
            'reg_no' => $request->input('reg_no'),
            'contact' => $request->input('contact'),
            'owner_name' => $request->input('owner_name'),
            'owner_contact' => $request->input('owner_contact'),
            'cnic' => $request->input('cnic'),
            'qualification' => $request->input('qualification'),
            'owner_email_address' => $request->input('owner_email_address'),
            'principal_name' => $request->input('principal_name'),
            'principal_contact' => $request->input('principal_contact'),
            'principal_cnic' => $request->input('principal_cnic'),
            'principal_qualification' => $request->input('principal_qualification'),
            'principal_email' => $request->input('principal_email'),
            'school_level' => $request->input('school_level'),
            'gender' => $request->input('gender'),
            'classrooms_no' => $request->input('classrooms_no'),
            'washrooms_no' => $request->input('washrooms_no'),
            'total_staff' => $request->input('total_staff'),
            'male_staff' => $request->input('male_staff'),
            'female_staff' => $request->input('female_staff'),
            'non_teaching_staff' => $request->input('non_teaching_staff'),
            'building' => $request->input('building'),
            'playground' => $request->input('playground'),
            'laboratories' => $request->input('laboratories'),
            'lab_attendent' => $request->input('lab_attendent'),
            'which_group_affiliated' => $request->input('which_group_affiliated'),
            'registered_body' => $request->input('registered_body'),
            'institute_run' => $request->input('institute_run'),
            'sufficient_budget' => $request->input('sufficient_budget'),

        ]);
        // $rawalpindi->update();
        return redirect()->back()->with('message', 'Record updated successfully.');

    }
    catch(Exception $e){
        Log::error('Error creating record:', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', "Error updating record: " . $e->getMessage());
    }
}

// Federal Affiliation Renewal code
public function federal_affiliation_renewal(){
    $federal = FederalAffiliationRenewal::get();
    return response()->json($federal);
}
public function federal_affiliation_renewal_edit(Request $request, $id){
    $federal = FederalAffiliationRenewal::findorFail($id);
    // dd($federal);
    return view('admin.pages.edit_federal_affiliation_renewal',compact('federal'));

}
public function federal_affiliation_renewal_update(Request $request, $id){
    try{
       $federal = FederalAffiliationRenewal::findorFail($id);
    $federal->update([
        'schoolname' => $request->input('schoolname'),
        'address' => $request->input('address'),
        'ownername' => $request->input('ownername'),
        'ownercontact' => $request->input('ownercontact'),
        'cnic' => $request->input('cnic'),
        'qualification' => $request->input('qualification'),
        'owneremail' => $request->input('owneremail'),
        'principalname' => $request->input('principalname'),
        'principalcontact' => $request->input('principalcontact'),
        'principalcnic' => $request->input('principalcnic'),
        'principalqualification' => $request->input('principalqualification'),
        'principalemail' => $request->input('principalemail'),
        'schoollevel' => $request->input('schoollevel'),
        'gender' => $request->input('gender'),
        'institute_code' => $request->input('institute_code'),
        'password' => $request->input('password'),

    ]);
         // Check if a new image file is uploaded
         if ($request->hasFile('previous_affiliation')) {
            // Delete the previous image file
            Storage::delete($federal->previous_affiliation);

            // Store the new image file
            $previous_affiliation = $request->file('previous_affiliation')->store('federal_renewal', 'public');
            $federal->update(['previous_affiliation' => $previous_affiliation]);
        }

        return redirect()->back()->with('message', 'Record updated successfully.');



   }
   catch(Exception $e){
    Log::error('Error creating record:', ['error' => $e->getMessage()]);
    return redirect()->back()->with('error', "Error updating record: " . $e->getMessage());
}



}

// Rawalpindi Affiliation Renewal
public function rawalpindi_affiliation_renewal(){
    $rwp = RawalpindiBoardAffiliationRenewal::get();
    return response()->json($rwp);
}

public function rawalpindi_affiliation_renewal_edit(Request $request , $id){
    $rawalpindi = RawalpindiBoardAffiliationRenewal::findorFail($id);

    return view('admin.pages.edit_rawalpindi_affiliation_renewal',compact('rawalpindi'));


}


public function rawalpindi_affiliation_renewal_update(Request $request , $id){
    try{

        $rawalpindi = RawalpindiBoardAffiliationRenewal::findorFail($id);
        $rawalpindi->update([
            'schoolname' => $request->input('schoolname'),
            'address' => $request->input('address'),
            'ownername' => $request->input('ownername'),
            'ownercontact' => $request->input('ownercontact'),
            'cnic' => $request->input('cnic'),
            'qualification' => $request->input('qualification'),
            'owneremail' => $request->input('owneremail'),
            'principalname' => $request->input('principalname'),
            'principalcontact' => $request->input('principalcontact'),
            'principalcnic' => $request->input('principalcnic'),
            'principalqualification' => $request->input('principalqualification'),
            'principalemail' => $request->input('principalemail'),
            'schoollevel' => $request->input('schoollevel'),
            'gender' => $request->input('gender'),
            'noclassrooms' => $request->input('noclassrooms'),
            'nowashrooms' => $request->input('nowashrooms'),
            'total_staff' => $request->input('total_staff'),
            'malestaff' => $request->input('malestaff'),
            'femalestaff' => $request->input('femalestaff'),
            'nonteachingstaff' => $request->input('nonteachingstaff'),
            'building' => $request->input('building'),
            'class' => $request->input('class'),
            'fee' => $request->input('fee'),
            'boys' => $request->input('boys'),
            'girls' => $request->input('girls'),
            'totalstudents' => $request->input('totalstudents'),
        ]);
        return redirect()->back()->with('message', 'Record updated successfully.');
    }
    catch(\Exception $e){
        Log::error('Error creating record:', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', "Error updating record: " . $e->getMessage());
    }




}

// College Registration Fresh code
public function get_college_registration_fresh(){
    try{
        $fresh_info = CollegeRegistrationFresh::get();
         return response()->json($fresh_info);

    }
    catch(\Exception $e){
        Log::error('Error creating record:', ['error' => $e->getMessage()]);
    }


}

public function get_college_registration_fresh_edit(Request $request , $id){
    try{
        $college = CollegeRegistrationFresh::findorFail($id);
        $districts = District::all();
        $tehsils = Tehsil::all();
        return view('admin.pages.edit_college_registration_fresh',compact('college','districts','tehsils'));


    }
    catch(\Exception $e){
        Log::error('Error creating record:', ['error' => $e->getMessage()]);
    }


}

public function get_college_registration_fresh_update(Request $request , $id){
    try{
        $college = CollegeRegistrationFresh::findorFail($id);

$submittedLabs = $request->input('labs');


$existingLabs = explode(',', $college->labs);

// Loop through the existing labs and remove those that are not present in the submitted labs
foreach ($existingLabs as $existingLab) {
    if (!in_array($existingLab, $submittedLabs)) {
        // Remove the lab from the existing labs array
        $key = array_search($existingLab, $existingLabs);
        unset($existingLabs[$key]);
    }
}
        $college->update([
            'college_name' => $request->input('college_name'),
            'district' => $request->input('district'),
            'tehsil' => $request->input('tehsil'),
            'uc_no' => $request->input('uc_no'),
            'na_no' => $request->input('na_no'),
            'pp_no' => $request->input('pp_no'),
            'gender' => $request->input('gender'),
            'gender_studying' => $request->input('gender_studying'),
            'location' => $request->input('location'),
            'shift' => $request->input('shift'),
            'establishment_year' => $request->input('establishment_year'),
            'college_address' => $request->input('college_address'),
            'college_type' => $request->input('college_type'),
            'college_email' => $request->input('college_email'),
            'registration_expiry_date' => $request->input('registration_expiry_date'),
            'college_contact_no' => $request->input('college_contact_no'),
            'owner_name' => $request->input('owner_name'),
            'owner_no' => $request->input('owner_no'),
            'owner_cnic' => $request->input('owner_cnic'),
            'principal_name' => $request->input('principal_name'),
            'principal_no' => $request->input('principal_no'),
            'principal_cnic' => $request->input('principal_cnic'),
            'ownership_nature' => $request->input('ownership_nature'),
            'male_teacher' => $request->input('male_teacher'),
            'female_teacher' => $request->input('female_teacher'),
            'college_stats' => $request->input('college_stats'),
            'univeristy_affiliation' => $request->input('university_affiliation'),
            'board_affiliation' => $request->input('board_affiliation'),
            'total_branches' => $request->input('total_branches'),
            'total_classrooms' => $request->input('total_classrooms'),
            'total_rooms' => $request->input('total_rooms'),
            'building_type' => $request->input('building_type'),
            'total_area' => $request->input('total_area'),
            'library_available' => $request->input('library_available'),
            // 'labs' => implode(',', $request->input('labs')),
            'labs' => implode(',', $submittedLabs),
            'total_computers_p1_p2_series' => $request->input('total_computers_p1_p2_series'),
            'total_computers_p3_series' => $request->input('total_computers_p3_series'),
            'total_computers_p4_series' => $request->input('total_computers_p4_series'),
            'functional_computers_p1_p2_series' => $request->input('functional_computers_p1_p2_series'),
            'functional_computers_p3_series' => $request->input('functional_computers_p3_series'),
            'functional_computers_p4_series' => $request->input('functional_computers_p4_series'),
            'admin_computers_p1_p2_series' => $request->input('admin_computers_p1_p2_series'),
            'admin_computers_p3_series' => $request->input('admin_computers_p3_series'),
            'admin_computers_p4_series' => $request->input('admin_computers_p4_series'),
        ]);
        return redirect()->back()->with('message', 'Record updated successfully.');


    }
    catch(\Exception $e){
        return redirect()->back()->with('error', "Error updating record: " . $e->getMessage());
        Log::error('Error creating record:', ['error' => $e->getMessage()]);
    }


}


// College Registration Renewal code
public function get_college_registration_renewal(){
    try{
        $renewal_info = CollegeRegistrationRenewal::get();
         return response()->json($renewal_info);

    }
    catch(\Exception $e){
        Log::error('Error creating record:', ['error' => $e->getMessage()]);
    }


}


public function get_college_registration_renewal_edit(Request $request , $id){
    try{
        $college = CollegeRegistrationRenewal::findorFail($id);
        $districts = District::get();
        $tehsils = Tehsil::get();
        return view('admin.pages.edit_college_registration_renewal',compact('college','districts','tehsils'));

    }
    catch(\Exception $e){
        Log::error('Error creating record:', ['error' => $e->getMessage()]);
    }


}


public function get_college_registration_renewal_update(Request $request , $id){
    try{
        $college = CollegeRegistrationRenewal::findorFail($id);

$submittedLabs = $request->input('labs');


$existingLabs = explode(',', $college->labs);

// Loop through the existing labs and remove those that are not present in the submitted labs
foreach ($existingLabs as $existingLab) {
    if (!in_array($existingLab, $submittedLabs)) {
        // Remove the lab from the existing labs array
        $key = array_search($existingLab, $existingLabs);
        unset($existingLabs[$key]);
    }
}
        $college->update([
            'college_name' => $request->input('college_name'),
            'district' => $request->input('district'),
            'tehsil' => $request->input('tehsil'),
            'uc_no' => $request->input('uc_no'),
            'na_no' => $request->input('na_no'),
            'pp_no' => $request->input('pp_no'),
            'gender' => $request->input('gender'),
            'gender_studying' => $request->input('gender_studying'),
            'location' => $request->input('location'),
            'shift' => $request->input('shift'),
            'establishment_year' => $request->input('establishment_year'),
            'college_address' => $request->input('college_address'),
            'college_type' => $request->input('college_type'),
            'college_email' => $request->input('college_email'),
            'registration_expiry_date' => $request->input('registration_expiry_date'),
            'college_contact_no' => $request->input('college_contact_no'),
            'owner_name' => $request->input('owner_name'),
            'owner_no' => $request->input('owner_no'),
            'owner_cnic' => $request->input('owner_cnic'),
            'principal_name' => $request->input('principal_name'),
            'principal_no' => $request->input('principal_no'),
            'principal_cnic' => $request->input('principal_cnic'),
            'ownership_nature' => $request->input('ownership_nature'),
            'male_teacher' => $request->input('male_teacher'),
            'female_teacher' => $request->input('female_teacher'),
            'college_stats' => $request->input('college_stats'),
            'univeristy_affiliation' => $request->input('university_affiliation'),
            'board_affiliation' => $request->input('board_affiliation'),
            'total_branches' => $request->input('total_branches'),
            'total_classrooms' => $request->input('total_classrooms'),
            'total_rooms' => $request->input('total_rooms'),
            'building_type' => $request->input('building_type'),
            'total_area' => $request->input('total_area'),
            'library_available' => $request->input('library_available'),
            // 'labs' => implode(',', $request->input('labs')),
            'labs' => implode(',', $submittedLabs),
            'total_computers_p1_p2_series' => $request->input('total_computers_p1_p2_series'),
            'total_computers_p3_series' => $request->input('total_computers_p3_series'),
            'total_computers_p4_series' => $request->input('total_computers_p4_series'),
            'functional_computers_p1_p2_series' => $request->input('functional_computers_p1_p2_series'),
            'functional_computers_p3_series' => $request->input('functional_computers_p3_series'),
            'functional_computers_p4_series' => $request->input('functional_computers_p4_series'),
            'admin_computers_p1_p2_series' => $request->input('admin_computers_p1_p2_series'),
            'admin_computers_p3_series' => $request->input('admin_computers_p3_series'),
            'admin_computers_p4_series' => $request->input('admin_computers_p4_series'),
        ]);
        return redirect()->back()->with('message', 'Record updated successfully.');


    }
    catch(\Exception $e){
        return redirect()->back()->with('error', "Error updating record: " . $e->getMessage());
        Log::error('Error creating record:', ['error' => $e->getMessage()]);
    }


}



// Hygeine Certificate
public function hygeine_certificate(){
    try{
        $hygeine = HygieneApplication::get();
          return response()->json($hygeine);

    }
    catch(\Exception $e){
        Log::error('Error creating record:', ['error' => $e->getMessage()]);
    }


}

public function hygeine_certificate_edit(Request $request ,  $id){
    try{
        $hygeine = HygieneApplication::findorFail($id);

        return view('admin.pages.edit_hygeine_certificate',compact('hygeine'));

    }
    catch(\Exception $e){
        Log::error('Error creating record:', ['error' => $e->getMessage()]);
    }


}

public function hygeine_certificate_update(Request $request ,  $id){
    try{
        $hygeine = HygieneApplication::findorFail($id);

        $hygeine->update([
            'institute_name' => $request->input('institute_name'),
            'institute_address' => $request->input('institute_address'),
            'owner_name' => $request->input('owner_name'),
            'contact_whatsapp' => $request->input('contact_whatsapp'),
            'owner_email' => $request->input('owner_email'),
            'school_level' => $request->input('school_level'),
            'building_type' => $request->input('building_type'),
            'number_of_students' => $request->input('number_of_students'),
            'number_of_staff_members' => $request->input('number_of_staff_members'),
            'number_of_rooms' => $request->input('number_of_rooms'),
            'number_of_blocks' => $request->input('number_of_blocks'),
            'classrooms_condition' => $request->input('classrooms_condition'),
            'playground' => $request->input('playground'),
            'medical_facilities' => $request->input('medical_facilities'),
            'canteen_condition' => $request->input('canteen_condition'),
            'extra_curricular_activities' => $request->input('extra_curricular_activities'),
            'remarks' => $request->input('remarks'),
        ]);

        return redirect()->back()->with('message', 'Hygeine details updated successfully.');

    }
    catch(\Exception $e){
        return redirect()->back()->with('error', "Error updating record: " . $e->getMessage());
        Log::error('Error creating record:', ['error' => $e->getMessage()]);
    }


}

// Building Certificate
public function building_certificate(){
    try{
        $building = BuildingData::get();
          return response()->json($building);

    }
    catch(\Exception $e){
        Log::error('Error creating record:', ['error' => $e->getMessage()]);
    }


}

public function building_certificate_edit(request $request , $id){
    try{
        $building = BuildingData::findorFail($id);
          return view('admin.pages.edit_building_certificate',compact('building'));

    }
    catch(\Exception $e){
        Log::error('Error creating record:', ['error' => $e->getMessage()]);
    }


}

public function building_certificate_update(request $request , $id){
    try{
        $building = BuildingData::findorFail($id);
        $building->update([
            'schoolname' => $request->input('schoolname'),
            'address' => $request->input('address'),
            'building_drawings' => $request->input('building_drawings'),
            'total_area' => $request->input('total_area'),
            'covered_area' => $request->input('covered_area'),
            'stories_no' => $request->input('stories_no'),
            'walls_thickness' => $request->input('walls_thickness'),
            'roof_height' => $request->input('roof_height'),
            'roof_type' => $request->input('roof_type'),
            'no_offices' => $request->input('no_offices'),
            'offices_dimensions' => $request->input('offices_dimensions'),
            'offices_covered_area' => $request->input('offices_covered_area'),
            'offices_seating_capacity' => $request->input('offices_seating_capacity'),
            'classroom_no' => $request->input('classroom_no'),
            'classroom_dimensions' => $request->input('classroom_dimensions'),
            'classroom_covered_area' => $request->input('classroom_covered_area'),
            'classroom_seating_capacity' => $request->input('classroom_seating_capacity'),
            'halls_no' => $request->input('halls_no'),
            'halls_dimensions' => $request->input('halls_dimensions'),
            'halls_covered_area' => $request->input('halls_covered_area'),
            'halls_seating_capacity' => $request->input('halls_seating_capacity'),
            'science_lab_no' => $request->input('science_lab_no'),
            'science_lab_dimensions' => $request->input('science_lab_dimensions'),
            'science_lab_covered_area' => $request->input('science_lab_covered_area'),
            'science_lab_seating_capacity' => $request->input('science_lab_seating_capacity'),
            'no_library' => $request->input('no_library'),
            'library_dimensions' => $request->input('library_dimensions'),
            'library_covered_area' => $request->input('library_covered_area'),
            'library_seating_capacity' => $request->input('library_seating_capacity'),
            'nowashrooms' => $request->input('nowashrooms'),
            'student_strength' => $request->input('student_strength'),
            'vantilation_system' => $request->input('vantilation_system'),
            'Fire_Extinguishers' => $request->input('Fire_Extinguishers'),
            'Security_Cameras' => $request->input('Security_Cameras'),
            'stairs_type' => $request->input('stairs_type'),
            'grill_type' => $request->input('grill_type'),
            'play_area' => $request->input('play_area'),
        ]);
        return redirect()->back()->with('message', 'Building details updated successfully.');


    }
    catch(\Exception $e){
        return redirect()->back()->with('error', "Error updating record: " . $e->getMessage());
        Log::error('Error creating record:', ['error' => $e->getMessage()]);
    }


}


// Ngo Registration code

public function ngo_registration(){
    $ngo = NGO_Registartion::get();
    return response()->json($ngo);
}


public function ngo_registration_edit(Request $request , $id){
    $ngo = NGO_Registartion::findorFail($id);
    return view('admin.pages.edit_ngo_registration',compact('ngo'));
}

public function ngo_registration_update(Request $request , $id){
    try{
        $ngo = NGO_Registartion::findorFail($id);
        $ngo->update([
            'president_name' => $request->input('president_name'),
            'president_cnic' => $request->input('president_cnic'),
            'ngo_name' => $request->input('ngo_name'),
            'head_office_address' => $request->input('head_office_address'),
            'organization_purpose' => $request->input('organization_purpose'),
            'area_of_operation' => $request->input('area_of_operation'),
            'ngo_nature' => $request->input('ngo_nature'),
            'establishing_date' => $request->input('establishing_date'),
        ]);

        return redirect()->back()->with('message', 'Building details updated successfully.');
    }
    catch(\Exception $e){
        return redirect()->back()->with('error', "Error updating record: " . $e->getMessage());
        Log::error('Error creating record:', ['error' => $e->getMessage()]);
    }

}

}
