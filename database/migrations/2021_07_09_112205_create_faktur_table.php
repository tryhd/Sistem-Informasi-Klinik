<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFakturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faktur', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->biginteger('resep_id')->unsigned();
            $table->biginteger('rkm_id')->unsigned();
            $table->float('tagihan');
        });
        Schema::table('faktur', function(Blueprint $table){
            $table->foreign('resep_id')->references('id')->on('resep')->onUpdate('cascade');
            $table->foreign('rkm_id')->references('id')->on('rk_medis')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faktur');
    }
}
