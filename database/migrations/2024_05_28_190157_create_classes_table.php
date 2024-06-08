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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->integer('students_qty')->nullable();
            $table->integer('credited_units');
            $table->unsignedSmallInteger('actual_units')->nullable();
            $table->integer('slots');
            $table->string('nstp_activity')->nullable();
            $table->string('parent_class_code')->nullable();
            $table->string('link_type')->nullable();
            $table->string('instruction_language');
            $table->integer('minimum_year_level')->nullable();
            $table->text('teams_assigned_link')->nullable();
            $table->date('effectivity_dateSL')->nullable();
            $table->timestamps();
            // $table->foreignId('course_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('aysem_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('block_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
};
