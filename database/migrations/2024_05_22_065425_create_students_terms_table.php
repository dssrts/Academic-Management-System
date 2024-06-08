<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('student_terms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_type');
            $table->boolean('graduating');
            $table->boolean('graduated');
            $table->boolean('enrolled');
            $table->unsignedInteger('year_level');
            $table->timestamps();
            $table->unsignedBigInteger('student_no');
            $table->unsignedBigInteger('aysem_id')->nullable();
            $table->unsignedBigInteger('program_id')->nullable();
            $table->unsignedBigInteger('block_id')->nullable();
            $table->unsignedBigInteger('registration_status_id')->nullable();

            // $table->foreign('student_no')->references('student_no')->on('students')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('aysem_id')->references('id')->on('aysems')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('block_id')->references('id')->on('blocks')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('registration_status_id')->references('id')->on('registration_statuses')->onDelete('cascade')->onUpdate('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_terms');
    }
};
