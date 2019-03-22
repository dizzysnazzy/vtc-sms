<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisteredUnitsTable extends Migration
{

    public function up()
    {
        Schema::create('registered_units', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level_id');
            $table->integer('student_id');
            $table->string('unit_name');
            $table->integer('unit_score_max')->default(0);
            $table->integer('unit_score_cat')->default(0);
            $table->integer('unit_score_main')->default(0);
            $table->float('unit_score_aggregate')->default(0);
            $table->string('unit_score_grade')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registered_units');
    }
}
