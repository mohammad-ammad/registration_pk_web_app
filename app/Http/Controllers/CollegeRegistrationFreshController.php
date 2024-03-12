<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Tehsil;
use Illuminate\Http\Request;

class CollegeRegistrationFreshController extends Controller
{
    public function college_registration(){
        $tehsils = Tehsil::get();
        $districts = District::get();
        return view('client.pages.college_registration_fresh',compact('tehsils','districts'));
    }
    public function college_registration_submit(Request  $request){

    }
}
