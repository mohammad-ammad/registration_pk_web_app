<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subarea;
use App\Models\Province;
use App\Models\District;
use App\Models\Tehsil;
use App\Models\Cities;
use App\Models\Area;

class LocationController extends Controller
{
    public function index(){
        $locations = Subarea::rightjoin('areas','areas.area_id','subareas.fk_area_id')
                                ->rightjoin('cities','cities.city_id','areas.fk_city_id')
                                ->rightjoin('tehsils','tehsils.tehsil_id','cities.fk_tehsil_id')
                                ->rightjoin('districts','districts.district_id','tehsils.fk_district_id')
                                ->rightjoin('provinces','provinces.province_id','districts.fk_province_id')
                                ->get();
        return view("admin.pages.view_locations")->with('locations',$locations);
    }

    public function add_view(){
        $province = Province::get();
        $district = District::get();
        $tehsil = Tehsil::get();
        $cities = Cities::get();
        $area = Area::get();
        return view("admin.pages.add_locations")
        ->with('provinces', $province)
        ->with('districts', $district)
        ->with('tehsils', $tehsil)
        ->with('cities', $cities)
        ->with('areas', $area);
    }

    public function add_province(Request $request){
        $request->validate([
            'province_name' => 'required',
        ]);

        $province = new Province();
        $province->province_name = $request->province_name;
        $province->save();

        return redirect()->route('admin.location.add')->with('success', 'Province added successfully');
    }

    public function add_district(Request $request){
        $request->validate([
            'district_name' => 'required',
        ]);

        $province = Province::where('province_id',$request->province_id)->select('province_name')->get();

        $district = new District();
        $district->district_name = $request->district_name;
        $district->province_name = $province[0]['province_name'];
        $district->fk_province_id = $request->province_id;
        $district->status = 0;

        $district->save();

        return redirect()->route('admin.location.add')->with('success', 'District added successfully');

    }

    public function add_tehsil(Request $request){
        $request->validate([
            'tehsil_name' => 'required',
        ]);

        $district = District::where('district_id',$request->district_id)->select('district_name')->get();

        $tehsil = new Tehsil();
        $tehsil->tehsil_name = $request->tehsil_name;
        $tehsil->district_name = $district[0]['district_name'];
        $tehsil->fk_district_id = $request->district_id;
        $tehsil->status = 1;

        $tehsil->save();

        return redirect()->route('admin.location.add')->with('success', 'Tehsil added successfully');
    }

    public function add_city(Request $request){
        $request->validate([
            'city_name' => 'required',
        ]);

        $tehsil = Tehsil::where('tehsil_id',$request->tehsil_id)->select('tehsil_name')->get();

        $cities = new Cities();
        $cities->city_name = $request->city_name;
        $cities->tehsil_name = $tehsil[0]['tehsil_name'];
        $cities->fk_tehsil_id = $request->tehsil_id;

        $cities->save();

        return redirect()->route('admin.location.add')->with('success', 'City added successfully');

    }

    public function add_area(Request $request){
        $request->validate([
            'area_name' => 'required',
        ]);

        $city = Cities::where('city_id',$request->city_id)->select('city_name')->get();

        $area = new Area();
        $area->area_name = $request->area_name;
        $area->city_name = $city[0]['city_name'];
        $area->fk_city_id = $request->city_id;
        
        $area->save();

        return redirect()->route('admin.location.add')->with('success', 'Area added successfully');

    }

    public function add_subarea(Request $request){
        $request->validate([
            'subarea_name' => 'required',
        ]);

        $area = Area::where('area_id',$request->area_id)->select('area_name')->get();

        $subarea = new Subarea();
        $subarea->subarea_name = $request->subarea_name;
        $subarea->area_name = $area[0]['area_name'];
        $subarea->fk_area_id = $request->area_id;

        $subarea->save();

        return redirect()->route('admin.location.add')->with('success', 'Sub-Area added successfully');
    }
    public function edit_view($province_id , $district_id , $tehsil_id , $city_id , $area_id , $subarea_id) {
        //getting data from models
        $province = Province::where('province_id',$province_id)->get();
        $district = District::where('district_id',$district_id)->get();
        $tehsil = Tehsil::where('tehsil_id',$tehsil_id)->get();
        $city = City::where('city_id',$city_id)->get();
        $area = Area::where('area_id',$area_id)->get();
        $subarea = Subarea::where('subarea_id',$subarea_id)->get();
        //show dropdown data from models
        $all_povinces = Province::get();
        $all_districts = District::get();
        $all_tehsils = Tehsil::get();
        $all_cities = City::get();
        $all_areas = Area::get();
        return view("admin.pages.edit_location")
        ->with('province', $province)
        ->with('district', $district);
        return view("admin.pages.edit_location")
        ->with('province', $province)
        ->with('district', $district)
        ->with('tehsil', $tehsil)
        ->with('city', $city)
        ->with('area', $area)
        ->with('subarea', $subarea)
        ->with('all_provinces', $all_provinces)
        ->with('all_districts', $all_districts)
        ->with('all_tehsils', $all_tehsils)
        ->with('all_cities', $all_cities)
        ->with('all_areas', $all_areas);
    }
    // public function edit_location(Request $request,$id){
    //     $location = Subareas::find($id);
    //     $location->fk_province_id = $request->input('province');
    //     $location->fk_district_id = $request->input('district');
    //     $location->fk_tahsil_id = $request->input('tehsil');
    //     $location->fk_city_id = $request->input('city');
    //     $location->fk_area_id = $request->input('area');
    //     $location->fk_subarea_id = $request->input('subarea');
    // }
}
