<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeRegistrationFresh extends Model
{
    use HasFactory;
    protected $table = 'college_registration_fresh';
    protected $fillable = [
        'college_name',
        'district',
        'tehsil',
        'uc_no',
        'na_no',
        'pp_no',
        'gender',
        'gender_studying',
        'location',
        'shift',
        'establishment_year',
        'college_address',
        'college_type',
        'college_email',
        'registration_expiry_date',
        'college_contact_no',
        'owner_name',
        'owner_no',
        'owner_cnic',
        'principal_name',
        'principal_no',
        'principal_cnic',
        'ownership_nature',
        'male_teacher',
        'female_teacher',
        'college_stats',
        'university_affiliation',
        'board_affiliation',
        'total_branches',
        'total_classrooms',
        'total_rooms',
        'building_type',
        'total_area',
        'library_available',
        'labs',
        'total_computers_p1_p2_series',
        'total_computers_p3_series',
        'total_computers_p4_series',
        'functional_computers_p1_p2_series',
        'functional_computers_p3_series',
        'functional_computers_p4_series',
        'admin_computers_p1_p2_series',
        'admin_computers_p3_series',
        'admin_computers_p4_series',
        'ownership_rented_deed',
        'hygiene_certificate',
        'building_fitness_certificate',
        'map_college_building',
        'security_arrangement_certificate',
        'franchise_certificate',
        'list_of_books',
        'list_of_lab_equipments',
        'required_fees',
        'playground_permission',
        'attested_certificate',
        'disclaimer',
    ];
}
