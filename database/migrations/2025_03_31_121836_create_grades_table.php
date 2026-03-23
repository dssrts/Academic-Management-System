<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('remarks');
            $table->double('grade')->unsigned()->nullable();
            $table->double('completion_grade')->unsigned()->nullable();
            $table->date('submitted_date')->nullable();
            $table->date('finalization_date')->nullable();
            $table->timestamps();
            $table->foreignId('class_id')->constrained('classes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('student_no')->constrained('students', 'student_no')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
}
