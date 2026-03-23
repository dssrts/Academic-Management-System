<?php

use App\Models\Course;
use App\Models\Faculty;
use App\Models\Instructor;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_faculty', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->unsignedBigInteger('class_id');
            // $table->unsignedBigInteger('instructor_id');
            $table->timestamps();

            $table->foreignId('class_id')->onDelete('cascade');
            $table->foreignId('instructor_id')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_faculty');
    }
};
