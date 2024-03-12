<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingData extends Model
{
    use HasFactory;
    protected $table = 'building_data';
    protected $fillable = [
        'schoolname',
        'address',
        'building_drawings',
        'total_area',
        'covered_area',
        'stories_no',
        'walls_thickness',
        'roof_height',
        'roof_type',
        'no_offices',
        'offices_dimensions',
        'offices_covered_area',
        'offices_seating_capacity',
        'classroom_no',
        'classroom_dimensions',
        'classroom_covered_area',
        'classroom_seating_capacity',
        'halls_no',
        'halls_dimensions',
        'halls_covered_area',
        'halls_seating_capacity',
        'science_lab_no',
        'science_lab_dimensions',
        'science_lab_covered_area',
        'science_lab_seating_capacity',
        'no_library',
        'library_dimensions',
        'library_covered_area',
        'library_seating_capacity',
        'nowashrooms',
        'student_strength',
        'vantilation_system',
        'Fire_Extinguishers',
        'Security_Cameras',
        'stairs_type',
        'grill_type',
        'play_area',
    ];
}
