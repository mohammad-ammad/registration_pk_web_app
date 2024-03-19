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
        Schema::create('school_registration_fresh_tabel', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->string('branch_name');
            $table->string('school_address');
            $table->string('school_status');
            $table->integer('no_of_boys');
            $table->integer('no_of_girls');
            $table->float('covered_area');
            $table->integer('no_of_teachers');
            $table->enum('school_type', ['boys', 'girls', 'combined']);
            $table->enum('school_affiliated', ['BISE', 'FBISE']);
            $table->enum('instruction_medium', ['english', 'urdu']);
            $table->enum('school_level', ['primary', 'middle', 'secondary']);
            $table->string('owner_name');
            $table->string('owner_ph_no');
            $table->string('owner_email');
            $table->string('principal_name');
            $table->string('principal_ph_no');
            $table->string('principal_email');
            $table->string('province_name');
            $table->string('district_name');
            $table->string('tehsil_name');
            $table->string('city_name');
            $table->string('latitude');
            $table->string('longitude')->nullable();
            $table->string('location_string')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_registration_fresh_tabel');
    }
};
