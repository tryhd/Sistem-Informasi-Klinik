<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resep', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->BigInteger('dokter_id')->unsigned();
            $table->BigInteger('obat_id')->unsigned();
            $table->Biginteger('pasien_id')->unsigned();
            $table->string('keterangan', 255);
            $table->enum('status', ['belum', 'selesai']);
        });
        Schema::table('resep', function(Blueprint $table){
        $table->foreign('dokter_id')->references('id')->on('pegawai')->onUpdate('cascade');
            $table->foreign('obat_id')->references('id')->on('obat')->onUpdate('cascade');
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
        Schema::dropIfExists('resep');
    }
}

