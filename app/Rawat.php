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
}
