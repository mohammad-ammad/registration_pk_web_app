<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FederalBoardAffiliationFresh extends Model
{
    use HasFactory;
    protected $table = 'federal_board_affiliation_fresh_tabel';
    protected $fillable = [
        'school_name',
        'address',
        'owner_name',
        'owner_contact',
        'owner_cnic',
        'qualification',
        'owner_email',
        'principal_name',
        'principal_contact',
        'principal_cnic',
        'principal_qualification',
        'principal_email',
        'school_level',
        'gender',
        'no_classrooms',
        'no_washrooms',
        'total_staff',
        'male_staff',
        'female_staff',
        'nonteaching_staff',
        'building',
        'class',
        'fee',
        'boys',
        'girls',
        'total_students',
        'teacher_name',
        'teacher_cnic',
        'teacher_qualification',
        'teacher_subject',
        'teacher_salary',
        'registration_letter',
        'building_map',
        'rent_agreement',
        'staff_statement',
        'owner_cnic_image',
        'contact_number_image',
        'email_address_image',
        'registered_certificate_image',
    ];
}
