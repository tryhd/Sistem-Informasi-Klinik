<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    //
    protected $table='resep';

    public function pasien(){
        return $this->belongsTo('App\pasien','pasien_id');
    }

    public function Obat(){
        return $this->belongsTo('App\obat','obat_id');
    }

}
