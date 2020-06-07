<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tagihan',50);
            $table->integer('biaya');
            $table->enum('bulanan',['y','t']);
            $table->enum('toSantri',['P','L']);
            $table->enum('active',['y','t']);
            $table->enum('angsur',['y','t']);
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
        Schema::dropIfExists('tagihans');
    }
}
