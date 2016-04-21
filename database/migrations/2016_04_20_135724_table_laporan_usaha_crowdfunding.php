<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableLaporanUsahaCrowdfunding extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_crowd', function (Blueprint $table) {
            $table->increments('id_laporan_c');
            //$table->string('nama_proyek');
            $table->string('bulan');
            $table->integer('tahun');
            $table->integer('total_pengeluaran');
            $table->integer('total_pemasukan');
            $table->integer('saldo_usaha');
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
        Schema::drop('laporan_crowd');
    }
}
