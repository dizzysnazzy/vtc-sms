<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{

    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('departments_id');
          $table->string('course_name');
          $table->string('course_code');
          $table->string('course_initials');
          $table->string('course_period');
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
