<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolRegistrationRenewal extends Model
{
    use HasFactory;
    protected $table = 'school_registration_renewal';
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
        'noclassrooms',
        'nowashrooms',
        'total_staff',
        'malestaff',
        'femalestaff',
        'nonteachingstaff',
        'building',
        'class',
        'fee',
        'boys',
        'girls',
        'totalstudents',
        'expiredelicense',
    ];
}
