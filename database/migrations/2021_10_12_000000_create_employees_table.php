<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('supervisor_employee_id')->nullable();
            $table->foreign('supervisor_employee_id')->references('id')->on('employees')->onDelete('restrict');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('education');
            $table->float('basic_salary');
            $table->string('country');
            $table->string('city');
            $table->string('street');
            $table->string('gender');
            $table->string('date_of_birth');
            $table->string('resume')->nullable();
            $table->string('avatar')->nullable();
            $table->string('marital_status');
            $table->string('military_service');
            $table->string('passport_number');
            $table->string('nationality');
            $table->string('joining_date');
            $table->string('mobile');

            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');

            $table->unsignedBigInteger('position_id');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');

            $table->unsignedBigInteger('award_id')->nullable();
            $table->foreign('award_id')->references('id')->on('awards')->onDelete('cascade');

            $table->unsignedBigInteger('deduction_id')->nullable();
            $table->foreign('deduction_id')->references('id')->on('deductions')->onDelete('cascade');

            $table->unsignedBigInteger('evaluation_id')->nullable();
            $table->foreign('evaluation_id')->references('id')->on('evaluations')->onDelete('cascade');

            $table->unsignedBigInteger('cash_advance_id')->nullable();
            $table->foreign('cash_advance_id')->references('id')->on('cash_advances')->onDelete('cascade');

            $table->rememberToken();
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
}
