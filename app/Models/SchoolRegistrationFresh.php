<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolRegistrationFresh extends Model
{
    use HasFactory;
    protected $table = 'school_registration_fresh_tabel';
    protected $fillable = [
        'school_name',
        'branch_name',
        'school_address',
        'school_status',
        'no_of_boys',
        'no_of_girls',
        'covered_area',
        'no_of_teachers',
        'school_type',
        'school_affiliated',
        'instruction_medium',
        'school_level',
        'owner_name',
        'owner_ph_no',
        'owner_email',
        'principal_name',
        'principal_ph_no',
        'principal_email',
        'province_name',
        'district_name',
        'tehsil_name',
        'city_name',
        'latitude',
        'longitude',
        'location_string',
    ];
}
