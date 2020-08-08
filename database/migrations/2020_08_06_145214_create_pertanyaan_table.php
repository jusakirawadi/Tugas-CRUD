<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul',100);
            $table->string('isi',255);
            $table->datetime('tanggal_dibuat',0)->nullable();
            $table->datetime('tanggal_diperbaharui',0)->nullable();   
            $table->unsignedBigInteger('profil_id')->nullable(); 
            $table->foreign('profil_id')->references('id')->on('profil');                   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertanyaan');
    }
}
