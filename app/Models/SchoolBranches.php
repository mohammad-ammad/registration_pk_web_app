<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolBranches extends Model
{
    protected $table = "schoolbranches";
    protected $primaryKey = "sc_br_id";
    protected $fillable = [
        'sc_br_name','fk_school_id','sc_br_address','sc_br_status','sc_br_level','sc_br_type','instruction_medium','no_of_boys','no_of_girls',
        'sc_br_covered_area','no_of_teachers','owner_name','owner_phone','owner_email','principal_name','principal_email','principal_phone',
        'fk_area_id','fk_subarea_id','fk_province_id','fk_city_id','fk_tehsil_id','fk_district_id','latitude','longitude','location_string'
    ];
    use HasFactory;
}
