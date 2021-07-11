<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRkMedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rk_medis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->BigInteger('pasien_id')->unsigned();
            $table->BigInteger('dokter_id')->unsigned();
            $table->string('diagnosa');
            $table->string('keluhan');
            $table->BigInteger('tindakan_id')->unsigned();
            $table->text('keterangan');
            $table->string('alergi_obat', 100);
            $table->float('bb');
            $table->float('tb');
            $table->float('tensi');
        });
        Schema::table('rk_medis', function(Blueprint $table){
            $table->foreign('dokter_id')->references('id')->on('pegawai')->onUpdate('cascade');
                $table->foreign('tindakan_id')->references('id')->on('tindakan')->onUpdate('cascade');
                $table->foreign('pasien_id')->references('id')->on('pasien')->onUpdate('cascade');
            });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rk_medis');
    }
}
