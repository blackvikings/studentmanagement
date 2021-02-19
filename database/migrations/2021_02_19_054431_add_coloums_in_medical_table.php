<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColoumsInMedicalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medical', function (Blueprint $table) {
            $table->enum('gender', ['male', 'female'])->default('male')->after('appoinment');
            $table->string('age')->nullable()->after('gender');
            $table->string('mobile_no')->nullable()->after('age');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medical', function (Blueprint $table) {
            //
        });
    }
}
