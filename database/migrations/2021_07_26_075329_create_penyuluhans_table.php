<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyuluhansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyuluhans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penyuluhan');
            $table->string('keterangan');
            $table->unsignedBigInteger('penyuluh_id');
            $table->foreign('penyuluh_id')->references('id')->on('penyuluhs')->onDelete('restrict');
            $table->unsignedBigInteger('kelurahan_id');
            $table->foreign('kelurahan_id')->references('id')->on('kelurahans')->onDelete('restrict');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('tempat_pelatihan');
            $table->string('lampiran')->nullable();
            // $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('penyuluhans');
    }
}
