<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nis',20)->unique();
            $table->string('nama');
            $table->string('telp_wali',20);
            $table->text('alamat');
            $table->unsignedBigInteger('kamar_id');
            $table->foreign('kamar_id')->references('id')->on('kamars')->onDelete('cascade');
            $table->unsignedBigInteger('kelas_id');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            $table->string('status',50);
            $table->enum('jk',['L','P']);
            $table->date('tgl_lahir');
            $table->enum('pendidikan_terakhir',['TK','SD','SMP','KULIAH']);
            $table->string('nama_ayah',100);
            $table->string('pekerjaan_ayah',100);
            $table->string('nama_ibu',100);
            $table->string('pekerjaan_ibu',100);
            $table->string('no_telp',20);
            $table->string('foto')->nullable();
            $table->string('kk')->nullable();
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
        Schema::dropIfExists('santris');
    }
}
