<?php

namespace App\Http\Controllers\Admin;

use DB;

use App\Models\School;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class GeoLocatorController extends Controller
{
    public function index(){
        $sc_count = DB::table('schoolbranches')->count('sc_br_id');
        $schools = School::join('schoolbranches','schools.school_id','schoolbranches.fk_school_id')->get();
        $districts = District::get();
        return view("admin.pages.geolocator")
        ->with('sc_count',$sc_count)
        ->with('schools',$schools)
        ->with('districts',$districts);
    }

    public function get_map_locations_ajax(Request $request){
        $school_id = $request->query('school_id');
        $district_id = $request->query('district_id');
        $tehsil_id = $request->query('tehsil_id');
        $cities_id = $request->query('cities_id');

    Log::info('Received parameters:', [
            'school_id' => $school_id,
            'district_id' => $district_id,
            'tehsil_id' => $tehsil_id,
            'cities_id' => $cities_id,
        ]);

        if($school_id !== null && $district_id !== null && $tehsil_id !== null && $cities_id !== null){
            $schools  = School::select('school_name','provinces.province_name','districts.district_name','cities.city_name','sc_br_name','sc_br_status','sc_br_id','latitude','longitude')
            ->join('schoolbranches','schools.school_id','schoolbranches.fk_school_id')
            ->join('provinces','provinces.province_id','schoolbranches.fk_province_id')
            ->join('districts','districts.district_id','schoolbranches.fk_district_id')
            ->join('tehsils','tehsils.tehsil_id','schoolbranches.fk_tehsil_id')
            ->join('cities','cities.city_id','schoolbranches.fk_city_id')
            ->where('cities.city_id',$cities_id)
            ->where('districts.district_id',$district_id)
            ->where('tehsils.tehsil_id',$tehsil_id)
            ->where('schools.school_id',$school_id)
            ->get();
        }
        else
        {
            $schools  = School::select('school_name','provinces.province_name','districts.district_name','cities.city_name','sc_br_name','sc_br_status','sc_br_id','latitude','longitude')
                                ->join('schoolbranches','schools.school_id','schoolbranches.fk_school_id')
                                ->join('provinces','provinces.province_id','schoolbranches.fk_province_id')
                                ->join('districts','districts.district_id','schoolbranches.fk_district_id')
                                ->join('tehsils','tehsils.tehsil_id','schoolbranches.fk_tehsil_id')
                                ->join('cities','cities.city_id','schoolbranches.fk_city_id')
                                ->get();
        }

        return response()->json($schools);
    }
}
