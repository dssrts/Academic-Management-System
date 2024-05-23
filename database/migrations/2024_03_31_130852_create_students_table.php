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
            $table->string("email");
            $table->integer("student_no");
            $table->string("last_name",45);
            $table->string("first_name",45);
            $table->string("middle_name",45)->nullable();
            $table->string("maiden_name")->nullable();
            $table->string("pedigree", 45)->nullable();
            $table->string("biological_sex",10);
            $table->string("civil_status",45);
            $table->string("citizenship",45);
            $table->string("student_type",45);
            $table->string("registration_status",45);
            $table->string("colleges");
            $table->string("program_code",45);
            $table->string("degree_program");
            $table->integer("entry_aysem");
            $table->date("graduation_date");
            $table->integer("year_level");
            $table->string("plm_email");
            $table->string("permanent_address");
            $table->timestamp('email_verified_at')->nullable();
            $table->string("mobile_no");
            $table->string("photo_link");
            $table->string("password");
            $table->string("remember_token",100);   
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
