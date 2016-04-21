<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeyAddcrowdReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        //
        Schema::table('laporan_crowd', function ($table) {
    $table->integer('id_pendanaan')->unsigned();

    $table->foreign('id_pendanaan')->references('id_pendanaan')->on('pendanaan');
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
