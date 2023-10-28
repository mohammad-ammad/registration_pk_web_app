<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\School;
use App\Models\Tehsil;
use App\Models\Province;

class DashboardController extends Controller
{
    public function index(Request $request){
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

        $tehsils = Tehsil::where('status',1)->get();
        $provinces = Province::get();

        if ($query) {
            $statusMap = [
                'registered' => 1,
                'unregistered' => 2,
                'underprocess' => 3,
            ];
        
            $val = $statusMap[$query] ?? 1;
        
            $schools = School::join('schoolbranches', 'schools.school_id', 'schoolbranches.fk_school_id')
                ->join('subareas', 'schoolbranches.fk_subarea_id', 'subareas.subarea_id')
                ->join('areas', 'subareas.fk_area_id', 'areas.area_id')
                ->join('institutestatus', 'institutestatus.status_id', 'schoolbranches.sc_br_status')
                ->join('cities', 'areas.fk_city_id', 'cities.city_id')
                ->where('schoolbranches.sc_br_status', $val)
                ->orderBy('sc_br_id', 'DESC')
                ->take(10)
                ->get();
        }
        else 
        {
            $schools = School::join('schoolbranches','schools.school_id','schoolbranches.fk_school_id')
            ->join('subareas','schoolbranches.fk_subarea_id','subareas.subarea_id')
            ->join('areas','subareas.fk_area_id','areas.area_id')
            ->join('institutestatus','institutestatus.status_id','schoolbranches.sc_br_status')
            ->join('cities','areas.fk_city_id','cities.city_id')
            ->orderBy('sc_br_id','DESC')
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


        return view('admin.pages.dashboard')
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
        ->with('tehsil_query',$tehsil_query);
    }
}
