<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    //

    public function rawats()
    {
        return $this->hasMany('App\Rawat', 'pasien_id', 'id');
    }
}
