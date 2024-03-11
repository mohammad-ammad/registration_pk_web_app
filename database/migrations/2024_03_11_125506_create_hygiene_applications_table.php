<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHygieneApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('hygiene_applications', function (Blueprint $table) {
            $table->id();
            $table->string('institute_name');
            $table->string('institute_address');
            $table->string('owner_name');
            $table->string('contact_whatsapp');
            $table->string('owner_email');
            $table->string('school_level');
            $table->integer('building_type');
            $table->integer('number_of_students');
            $table->integer('number_of_staff_members');
            $table->integer('number_of_rooms');
            $table->integer('number_of_blocks');
            $table->integer('classrooms_condition');
            $table->integer('playground');
            $table->integer('medical_facilities');
            $table->integer('canteen_condition');
            $table->string('extra_curricular_activities');
            $table->string('remarks');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hygiene_applications');
    }
}
