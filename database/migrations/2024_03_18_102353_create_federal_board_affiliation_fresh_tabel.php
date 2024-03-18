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
        Schema::create('federal_board_affiliation_fresh_tabel', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->string('address');
            $table->string('owner_name');
            $table->string('owner_contact');
            $table->string('owner_cnic');
            $table->string('qualification');
            $table->string('owner_email')->nullable();
            $table->string('principal_name');
            $table->string('principal_contact');
            $table->string('principal_cnic');
            $table->string('principal_qualification');
            $table->string('principal_email')->nullable();
            $table->string('school_level');
            $table->string('gender');
            $table->string('no_classrooms');
            $table->string('no_washrooms');
            $table->string('total_staff');
            $table->string('male_staff');
            $table->string('female_staff');
            $table->string('nonteaching_staff');
            $table->string('building');
            $table->string('class');
            $table->string('fee');
            $table->string('boys');
            $table->string('girls');
            $table->string('total_students');
            $table->string('teacher_name');
            $table->string('teacher_cnic');
            $table->string('teacher_qualification');
            $table->string('teacher_subject');
            $table->string('teacher_salary');
            $table->string('registration_letter');
            $table->string('building_map');
            $table->string('rent_agreement');
            $table->string('staff_statement');
            $table->string('owner_cnic_image');
            $table->string('contact_number_image');
            $table->string('email_address_image');
            $table->string('registered_certificate_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('federal_board_affiliation_fresh_tabel');
    }
};
