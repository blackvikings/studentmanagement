<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VocationalTraining extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vocationals', function (Blueprint $table) {
            $table->id();
            $table->string('studentId')->nullable();
            $table->string('name')->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->string('email')->nullable();
            $table->string('mobileNumber')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('motherName')->nullable();
            $table->string('fatherName')->nullable();
            $table->string('parentsMobileNumber')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode')->nullable();
            $table->string('state')->nullable();
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
        //
    }
}
