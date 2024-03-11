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
        Schema::create('rwp_affiliation_form_fresh', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->string('address');
            $table->string('district');
            $table->string('tehsil');
            $table->string('reg_no');
            $table->string('contact')->nullable();
            $table->string('owner_name');
            $table->string('owner_contact');
            $table->string('cnic');
            $table->string('qualification');
            $table->string('owner_email_address');
            $table->string('principal_name');
            $table->string('principal_contact');
            $table->string('principal_cnic');
            $table->string('principal_qualification');
            $table->string('principal_email');
            $table->string('school_level');
            $table->string('gender');
            $table->string('classrooms_no');
            $table->string('washrooms_no');
            $table->string('total_staff');
            $table->string('male_staff');
            $table->string('female_staff');
            $table->string('non_teaching_staff');
            $table->string('building');
            $table->string('playground');
            $table->string('laboratories');
            $table->string('lab_attendent');
            $table->string('which_group_affiliated');
            $table->string('registered_body');
            $table->string('institute_run');
            $table->string('sufficient_budget');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rwp_affiliation_form_fresh');
    }
};
