<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RwpAffiliateFormFresh extends Model
{
    use HasFactory;
    protected $table = 'rwp_affiliation_form_fresh';
    protected $fillable = [
        'school_name',
        'address',
        'district',
        'tehsil',
        'reg_no',
        'contact',
        'owner_name',
        'owner_contact',
        'cnic',
        'qualification',
        'owner_email_address',
        'principal_name',
        'principal_contact',
        'principal_cnic',
        'principal_qualification',
        'principal_email',
        'school_level',
        'gender',
        'classrooms_no',
        'washrooms_no',
        'total_staff',
        'male_staff',
        'female_staff',
        'non_teaching_staff',
        'building',
        'playground',
        'laboratories',
        'lab_attendent',
        'which_group_affiliated',
        'registered_body',
        'institute_run',
        'sufficient_budget',
    ];
}
