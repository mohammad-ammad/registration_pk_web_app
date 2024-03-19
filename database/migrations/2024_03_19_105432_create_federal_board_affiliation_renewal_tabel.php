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
        Schema::create('federal_board_affiliation_renewal_tabel', function (Blueprint $table) {
            $table->id();
            $table->string('schoolname');
            $table->string('address');
            $table->string('ownername');
            $table->string('ownercontact');
            $table->string('cnic');
            $table->string('qualification');
            $table->string('owneremail')->nullable();
            $table->string('principalname');
            $table->string('principalcontact');
            $table->string('principalcnic');
            $table->string('principalqualification');
            $table->string('principalemail')->nullable();
            $table->string('schoollevel');
            $table->string('gender');
            $table->string('institute_code');
            $table->integer('password');
            $table->string('previous_affiliation');
            $table->string('teacher_name')->nullable();
            $table->string('teacher_cnic')->nullable();
            $table->string('teacher_qualification')->nullable();
            $table->string('teacher_subject')->nullable();
            $table->string('teacher_salary')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('federal_board_affiliation_renewal_tabel');
    }
};
