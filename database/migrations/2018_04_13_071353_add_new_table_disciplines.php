<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewTableDisciplines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->integer('teacher_id')->unsigned()->nullable();
            $table->timestamps();

        });

        Schema::table('disciplines', function($table) {
            $table->foreign('teacher_id')->references('id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disciplines');
    }
}
