<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('departments_id');
            $table->integer('levels_id');
            $table->integer('tutors_id');
            $table->integer('courses_id');
            $table->integer('combined_subjects_id')->nullable();
            $table->string('unit_name');
            $table->string('unit_code');
            $table->string('unit_status');
            $table->integer('unit_score_max');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
