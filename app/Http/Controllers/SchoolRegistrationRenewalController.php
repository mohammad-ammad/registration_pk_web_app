<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolRegistrationRenewalController extends Controller
{
    public function school_registration_renewal(){
        return view('client.pages.school_registration_renewal');
    }
}
