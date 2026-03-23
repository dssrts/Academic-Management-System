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
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('student_no');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('maiden_name')->nullable();
            $table->string('suffix')->nullable();
            $table->date('birthdate');
            $table->string('permanent_address');
            $table->string('pedigree')->nullable();
            $table->string('religion');
            $table->string('personal_email')->unique();
            $table->string('mobile_no', 11)->unique();
            $table->string('telephone_no')->nullable();
            $table->string('photo_link')->nullable();
            $table->date('entry_date');
            $table->string('plm_email')->unique()->nullable();
            $table->boolean('paying')->default(0);
            $table->string('password')->nullable();
            $table->date('graduation_date')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('complexion')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('dominant_hand')->nullable();
            $table->string('medical_history')->nullable();
            $table->integer('lrn')->nullable();
            $table->string('school_name')->nullable();
            $table->string('school_address')->nullable();
            $table->string('school_type')->nullable();
            $table->string('strand')->nullable();
            $table->integer('year_entered')->nullable();
            $table->integer('year_graduated')->nullable();
            $table->string('honors_awards')->nullable();
            $table->double('general_average')->nullable();
            $table->string('remarks')->nullable();
            $table->string('org_name')->nullable();
            $table->string('org_position')->nullable();
            $table->string('previous_tertiary')->nullable();
            $table->string('previous_sem')->nullable();
            $table->string('father_last_name')->nullable();
            $table->string('father_first_name')->nullable();
            $table->string('father_middle_name')->nullable();
            $table->string('father_address')->nullable();
            $table->string('father_contact_no')->nullable();
            $table->string('father_office_employer')->nullable();
            $table->string('father_office_address')->nullable();
            $table->string('father_office_num')->nullable();
            $table->string('mother_lastname')->nullable();
            $table->string('mother_first_name')->nullable();
            $table->string('mother_middle_name')->nullable();
            $table->string('mother_address')->nullable();
            $table->string('mother_contact_no')->nullable();
            $table->string('mother_office_employer')->nullable();
            $table->string('mother_office_address')->nullable();
            $table->string('mother_office_num')->nullable();
            $table->string('guardian_lastname')->nullable();
            $table->string('guardian_first_name')->nullable();
            $table->string('guardian_middle_name')->nullable();
            $table->string('guardian_address')->nullable();
            $table->string('guardian_contact_no')->nullable();
            $table->string('guardian_office_employer')->nullable();
            $table->string('guardian_office_address')->nullable();
            $table->string('guardian_office_num')->nullable();
            $table->integer('annual_family_income')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('biological_sex_id');
            $table->unsignedBigInteger('civil_status_id');
            $table->unsignedBigInteger('citizenship_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('birthplace_city_id');
            $table->unsignedBigInteger('aysem_id');
            $table->string('degree_program_id', 15)->nullable();
            $table->string('registration_status_id', 15)->nullable();
            // removed the foreign ids coz andami na need na tables na di need sa module
        });

        DB::table('students')->insert([
            [
                'student_no' => 202300030,
                'last_name' => 'Shields',
                'first_name' => 'Maureen',
                'middle_name' => 'Daniel',
                'birthdate' => '2007-05-02',
                'permanent_address' => '8630 Dean Lane\nEast Charles, OH 62285',
                'religion' => 'Iglesia ni Cristo',
                'personal_email' => 'vbergstrom@example.com',
                'mobile_no' => '09345135723',
                'entry_date' => '2024-06-06',
                'plm_email' => 'mdshields2023@plm.edu.ph',
                'paying' => 0,
                'password' => '$2y$12$Yi/sMtsDbt82gKh/jLCk4.r3q6MEgdpYDe7E68tc42YRjpuixJAgO',
                'graduation_date' => '2024-06-01',
                'created_at' => '2024-06-05 16:23:03',
                'updated_at' => '2024-06-08 12:33:07',
                'biological_sex_id' => 2,
                'civil_status_id' => 1,
                'citizenship_id' => 1,
                'city_id' => 1,
                'birthplace_city_id' => 11,
                'aysem_id' => 117,
                'degree_program_id' => '1',
                'registration_status_id' => '1'
            ],
            // Add more student records here
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
