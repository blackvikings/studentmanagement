<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->string('feeName')->nullable();
            $table->string('feeNumber', 10)->nullable();
            $table->string('amount')->nullable();
            $table->enum('paymentStatus', ['pending', 'paid'])->default('pending');
            $table->bigInteger('studentId')->nullable()->unsigned();
            $table->foreign('studentId')->references('id')->on('students')->onDelete('cascade');
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
        Schema::dropIfExists('fees');
    }
}
