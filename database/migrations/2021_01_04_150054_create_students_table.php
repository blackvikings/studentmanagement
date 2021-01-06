<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('studentId');
            $table->string('name')->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->string('email')->nullable();
            $table->string('mobileNumber')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('motherName');
            $table->string('fatherName');
            $table->string('parentsMobileNumber');
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode')->nullable();
            $table->string('state')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('qualification')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
