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
        Schema::create('rawalpindi_board_affiliation_renewal', function (Blueprint $table) {
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
            $table->string('principalemail');
            $table->string('schoollevel');
            $table->string('gender');
            $table->string('noclassrooms');
            $table->string('nowashrooms');
            $table->string('total_staff');
            $table->string('malestaff');
            $table->string('femalestaff');
            $table->string('nonteachingstaff');
            $table->string('building');
            $table->string('class');
            $table->string('fee');
            $table->string('boys');
            $table->string('girls');
            $table->string('totalstudents');
            $table->string('rawalpindi_affiliation_renewal_expiredelicense');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rawalpindi_board_affiliation_renewal');
    }
};
