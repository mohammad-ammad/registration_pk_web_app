<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('building_data', function (Blueprint $table) {
            $table->id();
            $table->string('schoolname');
            $table->string('address');
            $table->text('building_drawings');
            $table->string('total_area');
            $table->string('covered_area');
            $table->string('stories_no')->nullable();
            $table->string('walls_thickness');
            $table->string('roof_height');
            $table->string('roof_type');
            $table->string('no_offices');
            $table->string('offices_dimensions');
            $table->string('offices_covered_area');
            $table->string('offices_seating_capacity');
            $table->string('classroom_no');
            $table->string('classroom_dimensions');
            $table->string('classroom_covered_area');
            $table->string('classroom_seating_capacity');
            $table->string('halls_no');
            $table->string('halls_dimensions');
            $table->string('halls_covered_area');
            $table->string('halls_seating_capacity');
            $table->string('science_lab_no');
            $table->string('science_lab_dimensions');
            $table->string('science_lab_covered_area');
            $table->string('science_lab_seating_capacity');
            $table->string('no_library');
            $table->string('library_dimensions');
            $table->string('library_covered_area');
            $table->string('library_seating_capacity');
            $table->string('nowashrooms');
            $table->string('student_strength');
            $table->string('vantilation_system');
            $table->string('Fire_Extinguishers');
            $table->string('Security_Cameras');
            $table->string('stairs_type');
            $table->string('grill_type');
            $table->string('play_area');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('building_data');
    }
};
