<?php

namespace App\Helpers;

use App\SettingOption as option;

class SettingOption
{
    public function getOptionVal($key) {
        $optionVal = option::where('setting_key', $key)->first();

        return $optionVal;
    }

    public function updateOptionVal($key, $val = 0) {
        $optionVal = option::where('setting_key', $key)->first();

        if ($key == 'no_rm') {
            $val = intVal($optionVal->setting_value) + 1;
        }

        $optionVal->setting_value = $val;

        $optionVal->save();

        return true;
    }

    public static function instance()
     {
         return new SettingOption();
     }
}