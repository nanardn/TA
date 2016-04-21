<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableDetailLaporanUsahaCrowdfunding extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_penggunaan_crowd', function (Blueprint $table) {
            $table->increments('id_laporan_ct');
           // $table->integer('id_laporan_c');
            /*$table->string('bulan');
            $table->integer('tahun');*/
            $table->integer('total_pengeluaran');
            $table->integer('total_pemasukan');
            $table->integer('saldo_dana_usaha');
            $table->string('akun');
            $table->date('date');
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
        Schema::drop('laporan_penggunaan_crowd');
    }
}
