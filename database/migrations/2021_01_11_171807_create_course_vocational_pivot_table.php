<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseVocationalPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_vocational', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->index();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->unsignedBigInteger('vocational_id')->index();
            $table->foreign('vocational_id')->references('id')->on('vocationals')->onDelete('cascade');
            $table->primary(['course_id', 'vocational_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_vocational');
    }
}
