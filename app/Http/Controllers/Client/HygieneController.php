<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HygieneApplication;

class HygieneController extends Controller
{
    public function showForm(){
        return view('client.pages.hygiene-certificate');
    }
    public function store(Request $request){
        // Validation
        $validatedData = $request->validate([
            'institute_name' => 'required|string|max:255',
            'institute_address' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'contact_whatsapp' => 'required|string|max:255',
            'owner_email' => 'required|email|max:255',
            'school_level' => 'required|string|max:255',
            'building_type' => 'required|integer', 
            'number_of_students' => 'required|integer',
            'number_of_staff_members' => 'required|integer',
            'number_of_rooms' => 'required|integer',
            'number_of_blocks' => 'required|integer', 
            'classrooms_condition' => 'required|integer',
            'playground' => 'required|integer',
            'medical_facilities' => 'required|integer',
            'canteen_condition' => 'required|integer',
            'extra_curricular_activities' => 'required|string|max:255',
            'remarks' => 'required|string|max:255',
        ]);
        HygieneApplication::create($validatedData);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Hygiene application submitted successfully!');
}
}
