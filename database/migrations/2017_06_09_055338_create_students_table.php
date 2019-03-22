<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{

    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('courses_id');
            $table->integer('level_id');
            $table->string('adm_date');
            $table->string('reg_no')->unique();
            $table->string('level_of_study');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('national_id')->unique();
            $table->string('gender');
            $table->string('dob');
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('address');
            $table->string('county');
            $table->string('ward')->nullable();
            $table->string('location')->nullable();
            $table->string('village')->nullable();
            $table->string('disability')->nullable();
            $table->string('previous_school');
            $table->string('extra_curicular')->nullable();
            $table->string('parent_name')->nullable();
            $table->string('parent_mobile')->nullable();
            $table->string('parent_address')->nullable();
            $table->string('mode_of_study');
            $table->string('sponsorship');
            $table->string('blood_group')->nullable();
            $table->string('enrolled_by');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
