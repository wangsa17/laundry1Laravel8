<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->string('kode_transaksi');
            $table->string('kode_invoice');
            $table->foreignId('outlet_id')->references('id_outlet')->on('outlet')->nullable();
            $table->foreignId('member_id')->references('id_member')->on('member');
            $table->foreignId('paket_id')->references('id_paket')->on('paket');
            $table->integer('berat')->nullable();
            $table->date('tgl')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->date('tgl_bayar')->nullable();
            $table->integer('biaya_tambahan')->nullable();
            $table->double('diskon')->nullable();
            $table->integer('pajak')->nullable();
            $table->enum('status_transaksi', ['Baru', 'Proses', 'Selesai', 'Diambil']);
            $table->enum('status_pembayaran', ['Dibayar', 'Belum Dibayar']);
            $table->foreignId('user_id')->references('id_user')->on('user')->nullable();
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
        Schema::dropIfExists('transaksi');
    }
}
