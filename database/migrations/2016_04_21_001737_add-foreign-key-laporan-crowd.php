<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyLaporanCrowd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('laporan_penggunaan_crowd', function ($table) {
    $table->integer('id_laporan_c')->unsigned();

    $table->foreign('id_laporan_c')->references('id_laporan_c')->on('laporan_crowd');
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
