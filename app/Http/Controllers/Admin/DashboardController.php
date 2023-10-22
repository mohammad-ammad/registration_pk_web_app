<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\School;

class DashboardController extends Controller
{
    public function index(Request $request){
        $query = $request->query('query');
        
        $sc_count = DB::table('schoolbranches')->count('sc_br_id');
        $sc_re_count = DB::table('schoolbranches')->where('sc_br_status','1')->count('sc_br_id');
        $sc_ure_count = DB::table('schoolbranches')->where('sc_br_status','2')->count('sc_br_id');
        $sc_up_count = DB::table('schoolbranches')->where('sc_br_status','3')->count('sc_br_id');
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
       
        return view('admin.pages.dashboard')
        ->with('sc_count',$sc_count)
        ->with('sc_re_count',$sc_re_count)
        ->with('sc_ure_count',$sc_ure_count)
        ->with('sc_up_count',$sc_up_count)
        ->with('schools',$schools);
    }
}
