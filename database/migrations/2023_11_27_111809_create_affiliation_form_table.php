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
        Schema::create('affiliation_form', function (Blueprint $table) {
            $table->id();
            $table->string('institute_name');
            $table->string('institute_address');
            $table->string('affiliation_type');
            $table->bigInteger('phone_number');
            $table->string('email');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('registration_type');
            $table->date('registration_issue_date');
            $table->date('registration_expiry_date');
            $table->string('franchise_name');
            $table->string('city');
            $table->string('tehsil');
            $table->string('district');
            $table->string('province');
            $table->string('group_name');
            $table->string('front_cnic_path');
            $table->string('back_cnic_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliation_form');
    }
};
