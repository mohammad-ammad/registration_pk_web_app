<?php

namespace App\Http\Controllers\Client;

use Illuminate\Support\Facades\Mail;
use App\Mail\NewSchoolRegistered;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\Cities;
use App\Models\Tehsil;
use App\Models\School;
use App\Models\SchoolBranches;
use DB;

class SchoolController extends Controller
{
    public function index(Request $request){
        $provinces = Province::all();
        $districts = District::all();
        $tehsils = Tehsil::all();
        $cities = Cities::all();
        //Check if the request is coming from the app
        if ($request->is('school-app-registration')) {
            return view('client.pages.school-registration', compact('provinces', 'districts', 'tehsils', 'cities'));
        }
        return view('client.pages.school-registration', compact('provinces', 'districts', 'tehsils', 'cities'));
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
            $letter = $this->getLetterForSchoolType($request->school_level);
            $serialNumber = $this->generateUniqueSerialNumber($letter);

            $branch = new SchoolBranches();
            $branch->fk_school_id = $school_id;
            $branch->sc_br_name = $request->branch_name;
            $branch->sc_br_address = $request->school_address;
            $branch->sc_br_status = $request->school_status;
            $branch->sc_br_emi_no = $serialNumber;
            $branch->sc_br_level = $request->school_level;
            $branch->sc_br_affiliated = $request->school_affiliated;
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

            //all form data in email
            $emaildata = $request->all();
            //modify form data in email
            config(['mail.from.address' => 'hello@example.com']);
            config(['mail.from.name' => config('app.name')]);
            Mail::to (['salihumar660@gmail.com'])->send(new \App\Mail\NewSchoolRegistered($emaildata));
            config(['mail.from.address'=>null]);
            config(['mail.from.name'=>null]);


            return redirect()->route('client.school')->with('success', 'School registered successfully');
        }
        else {
            DB::rollBack();
            return redirect()->route('client.school')->with('error', 'Delete operation failed');
        }

    }

    private function getLetterForSchoolType($schoolType)
    {
        switch ($schoolType) {
            case 'primary':
                return 'P';
            case 'secondary':
                return 'S';
            case 'middle':
                return 'E';
            default:
                return '';
        }
    }

    private function generateUniqueSerialNumber($letter)
    {
        $baseSerialNumber = sprintf('%03d', SchoolBranches::max('sc_br_id') + 1) . $letter;

        $uniqueSerialNumber = $baseSerialNumber;
        $counter = 1;

        while (SchoolBranches::where('sc_br_emi_no', $uniqueSerialNumber)->exists()) {
            $uniqueSerialNumber = $baseSerialNumber . '-' . $counter;
            $counter++;
        }

        return $uniqueSerialNumber;
    }
}
