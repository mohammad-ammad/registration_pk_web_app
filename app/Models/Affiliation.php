<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliation extends Model
{
    use HasFactory;

    protected $table = 'affiliation_form';

    protected $fillable = [
        'institute_name',
        'institute_address',
        'affiliation_type',
        'phone_number',
        'email',
        'latitude',
        'longitude',
        'registration_type',
        'registration_issue_date',
        'registration_expiry_date',
        'franchise_name',
        'city',
        'tehsil',
        'district',
        'province',
        'group_name',
        'front_cnic_path',
        'back_cnic_path',
    ];
}
