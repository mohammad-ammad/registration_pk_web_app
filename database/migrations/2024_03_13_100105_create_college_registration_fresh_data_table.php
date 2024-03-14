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
        Schema::create('college_registration_fresh', function (Blueprint $table) {
            $table->id();
            $table->string('college_name');
            $table->string('district');
            $table->string('tehsil');
            $table->string('uc_no');
            $table->string('na_no');
            $table->string('pp_no');
            $table->string('gender');
            $table->string('gender_studying');
            $table->string('location');
            $table->string('shift');
            $table->string('establishment_year');
            $table->string('college_address')->nullable();
            $table->string('college_type');
            $table->string('college_email');
            $table->string('registration_expiry_date');
            $table->string('college_contact_no');
            $table->string('owner_name');
            $table->string('owner_no');
            $table->string('owner_cnic');
            $table->string('principal_name');
            $table->string('principal_no');
            $table->string('principal_cnic');
            $table->string('ownership_nature');
            $table->string('male_teacher');
            $table->string('female_teacher');
            $table->string('college_stats');
            $table->string('university_affiliation');
            $table->string('board_affiliation');
            $table->string('total_branches');
            $table->string('total_classrooms');
            $table->string('total_rooms');
            $table->string('building_type');
            $table->string('total_area');
            $table->string('library_available');
            $table->string('labs')->nullable();
            $table->string('total_computers_p1_p2_series');
            $table->string('total_computers_p3_series');
            $table->string('total_computers_p4_series');
            $table->string('functional_computers_p1_p2_series');
            $table->string('functional_computers_p3_series');
            $table->string('functional_computers_p4_series');
            $table->string('admin_computers_p1_p2_series');
            $table->string('admin_computers_p3_series');
            $table->string('admin_computers_p4_series');
            $table->string('ownership_rented_deed');
            $table->string('hygiene_certificate');
            $table->string('building_fitness_certificate');
            $table->string('map_college_building');
            $table->string('security_arrangement_certificate');
            $table->string('franchise_certificate');
            $table->string('list_of_books');
            $table->string('list_of_lab_equipments');
            $table->string('required_fees');
            $table->string('playground_permission');
            $table->string('attested_certificate');
            $table->string('disclaimer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('college_registration_fresh');
    }
};
