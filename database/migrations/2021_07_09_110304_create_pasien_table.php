<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama', 100);
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->text('alamat');
            $table->biginteger('wilayah_id')->unsigned();
            $table->date('tgl_lahir');
            $table->string('telp', 13);
            $table->string('pekerjaan', 40);
            $table->enum('status', ['antri', 'periksa', 'obat', 'selesai']);
            $table->string('layanan_dokter', 15);
        });
        Schema::table('pasien', function(Blueprint $table){
            $table->foreign('wilayah_id')->references('id')->on('wilayah')->onUpdate('cascade');
            // $table->foreign('id_kriteria')->references('id')->on('wilayah')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien');
    }
}
