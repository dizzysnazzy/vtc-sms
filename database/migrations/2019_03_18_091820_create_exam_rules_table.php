<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamRulesTable extends Migration
{

    public function up()
    {
        Schema::create('exam_rules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grades_id');
            $table->string('exam_rule_name');
            $table->text('subjects_distribution');
            $table->text('marks_distribution')->nullable();
            $table->text('entry_by');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exam_rules');
    }
}
