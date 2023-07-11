<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTagTable extends Migration
{
    public function up()
    {
        Schema::create('project_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('technology_id');

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('technology_id')->references('id')->on('technologys');
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_tag');
    }
}
