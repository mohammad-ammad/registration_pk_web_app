<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FederalAffiliationRenewal extends Model
{
    use HasFactory;
    protected $table = 'federal_board_affiliation_renewal_tabel';
    protected $fillable = [
        'schoolname',
        'address',
        'ownername',
        'ownercontact',
        'cnic',
        'qualification',
        'owneremail',
        'principalname',
        'principalcontact',
        'principalcnic',
        'principalqualification',
        'principalemail',
        'schoollevel',
        'gender',
        'institute_code',
        'password',
        'previous_affiliation',
        'teacher_name',
        'teacher_cnic',
        'teacher_qualification',
        'teacher_subject',
        'teacher_salary',
    ];
}
