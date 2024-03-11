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
        Schema::create('ngo_registration_form', function (Blueprint $table) {
            $table->id();
            $table->string('president_name');
            $table->string('president_cnic');
            $table->string('ngo_name');
            $table->string('head_office_address');
            $table->text('organization_purpose');
            $table->string('area_of_operation');
            $table->string('ngo_nature')->nullable();
            $table->string('president_domicile');
            $table->date('establishing_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ngo_registration_form');
    }
};
