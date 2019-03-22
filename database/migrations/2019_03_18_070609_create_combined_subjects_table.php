<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombinedSubjectsTable extends Migration
{

    public function up()
    {
        Schema::create('combined_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('combined_name');
            $table->string('combined_code');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('combined_subjects');
    }
}
