<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    //
    protected $table='pasien';
    public function wilayah(){
        return $this->belongsTo('App\Wilayah','wilayah_id');
    }
}
