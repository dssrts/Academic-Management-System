<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('maiden_name')->nullable();
            $table->string('instructor_code');
            $table->string('pedigree')->nullable();
            $table->date('birth_date');
            $table->string('mobile_phone');
            $table->string('email_address');
            $table->string('tin_number', 15)->nullable()->unique();
            $table->string('gsis_number')->nullable()->unique();
            $table->string('street_address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('faculty_name');
            $table->timestamps();
            $table->unsignedBigInteger('birthplace_id');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('biological_sex_id');
            $table->unsignedBigInteger('civil_status_id');
            $table->unsignedBigInteger('college_id');
            $table->unsignedBigInteger('citizenship_id');

            // $table->foreign('birthplace_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('biological_sex_id')->references('id')->on('biological_sexes')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('civil_status_id')->references('id')->on('civil_statuses')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('college_id')->references('id')->on('colleges')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('citizenship_id')->references('id')->on('citizenships')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instructors');
    }
};
