<?php

use Illuminate\Database\Seeder;

use App\SettingOption;

class SettingoptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seetingoption = [
            ['id' => 1, 'setting_key' => 'no_rm', 'setting_value' => '00000', 'setting_desc' => 'Kode RM'],
            ['id' => 2, 'setting_key' => 'kd_sehat', 'setting_value' => '600', 'setting_desc' => 'Kode Sehat'],
            ['id' => 3, 'setting_key' => 'kd_sakit', 'setting_value' => '700', 'setting_desc' => 'Kode Sakit'],
            ['id' => 4, 'setting_key' => 'kd_rujuk', 'setting_value' => '800', 'setting_desc' => 'Kode Sehat'],
            ['id' => 5, 'setting_key' => 'covid', 'setting_value' => '500', 'setting_desc' => 'Kode Sehat'],
            ['id' => 6, 'setting_key' => 'digrm', 'setting_value' => '5', 'setting_desc' => 'Digit RM']
        ];

        SettingOption::insert($seetingoption);
    }
}
