<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    //
    protected $table='faktur';
    public function pasien(){
        return $this->belongsTo('App\pasien','pasien_id');
    }
    public function resep(){
        return $this->belongsTo('App\resep','reesep_id');
    }
    public function medis(){
        return $this->belongsTo('App\Rk_medis','rkm_id');
    }
}
