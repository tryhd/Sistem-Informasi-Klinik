<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    //
    protected $table='pegawai';
    public function wilayah(){
        return $this->belongsTo('App\Wilayah','wilayah_id');
    }
}
