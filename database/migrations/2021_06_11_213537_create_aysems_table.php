<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAysemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aysems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('academic_year');
            $table->string('academic_year_code', 255);
            $table->integer('semester');
            $table->string('academic_year_sem', 255);
            $table->date('date_start');
            $table->date('date_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aysems');
    }
}
