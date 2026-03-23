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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->foreignId('job_id');
            $table->longText('employee_type');
            $table->string('school_email')->nullable();
            $table->string('religion');
            $table->string('civil_status');
            $table->longText('college_id')->charset('utf8mb4')->collation('utf8mb4_bin');
            $table->longText('department_id')->charset('utf8mb4')->collation('utf8mb4_bin');
            $table->longText('is_college_head')->charset('utf8mb4')->collation('utf8mb4_bin');
            $table->longText('is_department_head')->charset('utf8mb4')->collation('utf8mb4_bin');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->decimal('age', 8, 2);
            $table->string('gender')->default('Would Rather Not say');
            $table->string('personal_email');
            $table->string('phone');
            $table->date('birth_date');
            $table->string('address');
            $table->date('start_of_employment');
            $table->date('end_of_employment')->nullable();
            $table->longText('employee_history')->charset('utf8mb4')->collation('utf8mb4_bin')->nullable();
            $table->decimal('vacation_credits', 8, 2)->default(0.00);
            $table->decimal('sick_credits', 8, 2)->default(0.00);
            $table->integer('study_available_units')->nullable();
            $table->integer('teach_available_units')->nullable();
            $table->string('current_position');
            $table->boolean('is_faculty');
            $table->decimal('salary', 10, 2);
            $table->decimal('cto', 8, 2)->default(0.00);
            $table->boolean('active')->default(true);
            $table->binary('emp_image')->nullable();
            $table->boolean('emp_diploma')->nullable();
            $table->boolean('emp_tor')->nullable();
            $table->boolean('emp_cert_of_trainings_seminars')->nullable();
            $table->boolean('emp_auth_copy_of_csc_or_prc')->nullable();
            $table->boolean('emp_auth_copy_of_prc_board_rating')->nullable();
            $table->boolean('emp_med_certif')->nullable();
            $table->boolean('emp_nbi_clearance')->nullable();
            $table->boolean('emp_psa_birth_certif')->nullable();
            $table->boolean('emp_psa_marriage_certif')->nullable();
            $table->boolean('emp_service_record_from_other_govt_agency')->nullable();
            $table->boolean('emp_approved_clearance_prev_employer')->nullable();
            $table->boolean('other_documents')->nullable();
            $table->boolean('approval')->default(false);
            $table->boolean('fines')->default(false);
            $table->boolean('report')->default(false);
            $table->boolean('book_management')->default(false);
            $table->boolean('role_management')->default(false);
            $table->boolean('patron_manage')->default(false);
            $table->string('spec')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
