<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_surats', function (Blueprint $table) {
            $table->id();
            $table->string('pengirim')->nullable();
            $table->string('no_surat');
            $table->text('isi_ringkas');
            $table->date('tanggal_surat');
            $table->date('tanggal_diterima');
            $table->text('keterangan')->nullable();
            $table->text('file')->nullable();
            $table->string('kategori');
            $table->string('created_by');
            $table->string('updated_by');
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
        Schema::dropIfExists('transaksi_surats');
    }
}
