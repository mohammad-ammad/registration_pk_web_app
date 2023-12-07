<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Affiliation;
use App\Models\Cities;
use App\Models\Tehsil;
use App\Models\District;
use App\Models\Province;

class AdminAffiliationController extends Controller
{ 
    public function index(){
        $affiliations = Affiliation::all();
    return view ('admin.pages.view_affiliation' , ['affiliations' => $affiliations]);
    }
    public function viewMore($id){
        $affiliation = Affiliation::find($id);
        return view('admin.pages.viewmore-affiliation', compact('affiliation'));
    }
    public function editAffiliation($id)
    {
        $affiliation = Affiliation::find($id);
        $cities = Cities::get();
        $tehsils = Tehsil::get();
        $districts = District::get();
        $provinces = Province::get();

        if (!$affiliation) {
            return redirect()->back()->with('error', 'Affiliation not found.');
        }

        return view('admin.pages.edit-viewmore-affiliation', compact('affiliation'));
    }
     //Update Function
    public function updateAffiliation(Request $request, $id){
        $affiliation = Affiliation::find($id);
    
        if (!$affiliation) {
            return redirect()->back()->with('error', 'Affiliation not found.');
        }
        $affiliation->update([
            'institute_name' => $request->input('instituteName'),
            'institute_address' => $request->input('instituteAddress'),
            'affiliation_type' => $request->input('affiliationType'),
            'phone_number' => $request->input('phoneNumber'),
            'email' => $request->input('email'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'registration_type' => $request->input('registrationType'),
            'registration_issue_date' => $request->input('registrationIssueDate'),
            'registration_expiry_date' => $request->input('registrationExpiryDate'),
            'franchise_name' => $request->input('franchiseName'),
            'city' => $request->input('city'),
            'tehsil' => $request->input('tehsil'),
            'district' => $request->input('district'),
            'province' => $request->input('province'),
            'group_name' => $request->input('group'),
            // 'front_cnic_path' => $request->file('frontCnic')->store('cnic', 'public'), // assuming 'frontCnic' is the file input name
            // 'back_cnic_path' => $request->file('backCnic')->store('cnic', 'public'), // assuming 'backCnic' is the file input name
        ]);
        if ($request->hasFile('frontCnic')) {
            $affiliation->update([
                'front_cnic_path' => $request->file('frontCnic')->store('cnic', 'public'),
            ]);
        }
        if ($request->hasFile('backCnic')) {
            $affiliation->update([
                'back_cnic_path' => $request->file('backCnic')->store('cnic', 'public'),
            ]);
        }
    
        return back();
    }
    
    public function deleteAffiliation($id)
    {
        $affiliation = Affiliation::find($id);

        if (!$affiliation) {
            return redirect()->back()->with('error', 'Affiliation not found.');
        }

        $affiliation->delete();

        return back();
    }
}
