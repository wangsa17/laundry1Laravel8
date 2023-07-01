<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_detail', function (Blueprint $table) {
            $table->id('id_detail');
            $table->foreignId('transaksi_id')->references('id_transaksi')->on('transaksi');
            $table->foreignId('paket_id')->references('id_paket')->on('paket');
            $table->double('qty');
            $table->integer('total_harga')->nullable();
            $table->text('keterangan')->nullable();
            $table->integer('total_bayar')->nullable();
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
        Schema::dropIfExists('transaksi_detail');
    }
}
