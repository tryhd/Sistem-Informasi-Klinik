<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama', 100);
            $table->date('tgl_lahir');
            $table->string('no_tlp',13);
            $table->text('alamat');
            $table->bigInteger('wilayah_id')->unsigned();
            $table->string('jabatan');
            $table->string('photo')->nullable();
        });
        Schema::table('pegawai', function(Blueprint $table){
            $table->foreign('wilayah_id')->references('id')->on('wilayah')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
