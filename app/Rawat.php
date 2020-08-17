<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rawat extends Model
{
    //
    public function pasiens()
    {
        return $this->belongsTo('App\Pasien', 'pasien_id', 'id');
    }

    //
    public function dokter()
    {
        return $this->belongsTo('App\User', 'dokter_id', 'id');
    }
}
