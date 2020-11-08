<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingOption extends Model
{
    protected $fillable = [
        'setting_key',
        'setting_value',
        'setting_desc'
    ];
}
