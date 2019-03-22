<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitMarksTable extends Migration
{

    public function up()
    {
        Schema::create('unit_marks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('units_id');
            $table->integer('tutors_id');
            $table->integer('students_id');
            $table->integer('exams_id');
            $table->integer('levels_id');
            $table->integer('marks');
            $table->string('grade');
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('unit_marks');
    }
}
