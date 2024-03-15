<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\School;
use App\Models\Tehsil;
use App\Models\Province;
use App\Models\District;
use App\Models\SchoolRegistrationRenewal;

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


        return view('admin.pages.dashboard',compact('school_registration_renewal'))
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
}
