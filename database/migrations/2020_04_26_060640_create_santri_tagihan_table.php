<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantriTagihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santri_tagihan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('santri_id')->unsigned();
            $table->integer('tagihan_id')->unsigned();
            $table->string('no_pembayaran')->nullable();
            $table->integer('jumlah_bayar')->nullable();
            $table->bigInteger('bulan');
            $table->string('ket',50);
            $table->date('tgl_pembayaran')->nullable();
            $table->string('konfirmasi')->nullable();
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
        Schema::dropIfExists('pembayarans');
    }
}
