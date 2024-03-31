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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer("student_no");
            $table->string("last_name");
            $table->string("first_name");
            $table->string("middle_name")->nullable();
            $table->string("biological_sex");
            $table->string("birthdate");
            $table->string("birthdate_city");
            $table->string("religion");
            $table->string("civil_status");
            $table->string("student_type");
            $table->string("registration_status");
            $table->integer("year_level");
            $table->foreignId('college_id')->constrained()->cascadeOnDelete();
            $table->foreignId('department_id')->constrained()->cascadeOnDelete();
            $table->string("academic_year");
            $table->string("permanent_address");
            $table->string("plm_email");
            $table->string("personal_email");
            $table->integer("mobile_no");
            $table->integer("telephone_no")->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
