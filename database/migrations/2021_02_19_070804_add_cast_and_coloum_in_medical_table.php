<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCastAndColoumInMedicalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medical', function (Blueprint $table) {
            $table->string('cast')->nullable()->after('mobile_no');
            $table->string('discount')->nullable()->after('cast');
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
