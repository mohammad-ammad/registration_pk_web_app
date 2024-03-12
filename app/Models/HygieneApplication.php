<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HygieneApplication extends Model
{
    use HasFactory;

    protected $table = 'hygiene_applications';

    protected $fillable = [
        'institute_name',
        'institute_address',
        'owner_name',
        'contact_whatsapp',
        'owner_email',
        'school_level',
        'building_type',
        'number_of_students',
        'number_of_staff_members',
        'number_of_rooms',
        'number_of_blocks',
        'classrooms_condition',
        'playground',
        'medical_facilities',
        'canteen_condition',
        'extra_curricular_activities',
        'remarks',
    ];
}
