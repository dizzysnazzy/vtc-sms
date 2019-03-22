<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorsTable extends Migration
{

    public function up()
    {
        Schema::create('tutors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('departments_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('national_id');
            $table->string('gender');
            $table->string('dob');
            $table->string('phone');
            $table->string('address');
            $table->string('photo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tutors');
    }
}
