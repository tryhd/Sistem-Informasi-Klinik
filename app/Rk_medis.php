<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rk_medis extends Model
{
    //
    protected $table='rk_medis';
    public function pasien(){
        return $this->belongsTo('App\pasien','pasien_id');
    }
    public function tindakan(){
        return $this->belongsTo('App\tindakan','tindakan_id');
    }
}
