<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianPesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_pesertas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('objek_penilaian_id');
            $table->foreign('objek_penilaian_id')->references('id')->on('objek_penilaians')->onDelete('restrict');
            $table->unsignedBigInteger('peserta_id');
            $table->foreign('peserta_id')->references('id')->on('pesertas')->onDelete('restrict');
            $table->string('nilai');
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
        Schema::dropIfExists('penilaian_pesertas');
    }
}
