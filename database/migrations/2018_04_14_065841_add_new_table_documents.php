<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewTableDocuments extends Migration
{ /**
 * Run the migrations.
 *
 * @return void
 */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('discipline_id')->unsigned()->nullable();
            $table->integer('teacher_id')->unsigned()->nullable();
            $table->integer('course_id')->unsigned()->nullable();
            $table->string('theoretical_material')->nullable();
            $table->string('practical_material')->nullable();
            $table->string('semester_work')->nullable();
            $table->string('independent_work')->nullable();
            $table->string('fos')->nullable();
            $table->string('other')->nullable();
            $table->timestamps();
        });

        Schema::table('documents', function($table) {
            $table->foreign('discipline_id')->references('id')->on('disciplines');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('course_id')->references('id')->on('courses');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
