<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NGO_Registartion extends Model
{
    use HasFactory;
    protected $table = 'ngo_registration_form';
    protected $fillable = [
        'president_name',
        'president_cnic',
        'ngo_name',
        'head_office_address',
        'organization_purpose',
        'area_of_operation',
        'ngo_nature',
        'president_domicile',
        'establishing_date',
    ];
}
