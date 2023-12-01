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
    //Edit Function
    public function edit_view($province_id, $district_id, $tehsil_id, $city_id, $area_id, $subarea_id) {
        // dd($province_id, $district_id, $tehsil_id, $city_id, $area_id);
        $provinces = Province::all();   
        $province = Province::find($province_id);
        $districts = District::all();
        $district = District::find($district_id);
        $tehsils = Tehsil::all();
        $tehsil = Tehsil::find($tehsil_id);
        $cities = Cities::all();
        $city = Cities::find($city_id);
        $areas = Area::all();
        $area = Area::find($area_id);
        $subarea  = Subarea::find($subarea_id);
        return view("admin.pages.edit_location", compact('provinces','province', 'districts', 'district', 'tehsils', 'tehsil', 'cities', 'city', 'areas', 'area', 'subarea'));
    }
    //Update Function For Province
    public function update_province(Request $request, $province_id) {
        $request->validate([
            'province_name' => 'required',
        ]);
        $province = Province::find($province_id);
        $province->province_name = $request->province_name;
        $province->save();
         return back();
    }
    //Update Function For District 
    public function update_district(Request $request, $district_id) {
        $request->validate([
            'district_name' => 'required',
        ]);
        $district = District::find($district_id);
        $district->district_name = $request->district_name;
        $district->save();
         return back();
    }
    //Update Function For Tehsil
    public function update_tehsil(Request $request, $tehsil_id){
        $request->validate([
            'tehsil_name' => 'required',
        ]);
        $tehsil = Tehsil::find($tehsil_id);
        $tehsil->tehsil_name = $request->tehsil_name;
        $tehsil->save();
        return back();
    }
    //Update Function For City
    public function update_city(Request $request, $city_id){
        $request->validate([
            'city_name' => 'required',
        ]);
        $city = Cities::find($city_id);
        $city->city_name = $request->city_name;
        $city->save();
        return back();
    }
    //Update Function For Area
    public function update_area(Request $request, $area_id){
        $request->validate([
            'area_name' => 'required',
        ]);
        $area = Area::find($area_id);
        $area->area_name = $request->area_name;
        $area->save();
        return back();
    }
    //Update Function For Sub Area
    public function update_subarea(Request $request, $subarea_id){
        $request->validate([
            'subarea_name' => 'required',
        ]);
        $subarea = Subarea::find($subarea_id);
        $subarea->subarea_name = $request->subarea;
        $subarea->save();
        return back();
    }
    //Delete Function
//     public function delete_location($id)
// {
//     $location = Subarea::find($id);

//     if ($location) {
//         $location->delete();
//         return redirect()->back()->with('success', 'Location deleted successfully');
//     } else {
//         return redirect()->back()->with('error', 'Location not found');
//     }
// }
}
