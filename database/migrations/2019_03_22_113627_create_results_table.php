<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{

    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('level_id');
            $table->string('unit_code');
            $table->string('unit_name');
            $table->float('unit_score_aggregate');
            $table->float('unit_score_grade');
            $table->string('result_status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('results');
    }
}
