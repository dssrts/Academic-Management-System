<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_records', function (Blueprint $table) {
            $table->id(); // unsignedBigInteger 'id' column
            $table->unsignedBigInteger('student_id'); // Use unsignedBigInteger for foreign key
            $table->integer('control_no');
            $table->string('status', 45);
            $table->string('school_year', 255);
            $table->tinyInteger('semester');
            $table->timestamp('date_enrolled');
            $table->decimal('GWA', 5, 2);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_records');
    }
}
