<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name' => 'Work_day',
            'value' => '0',
            'value_int' => 0,
        ]);

        Setting::create([
            'name' => 'Day_bonus',
            'value' => '0',
            'value_int' => 0,
        ]);

        Setting::create([
            'name' => 'New_users',
            'value' => '0',
            'value_int' => 0,
        ]);

        Setting::create([
            'name' => 'Day_payments',
            'value' => '0',
            'value_int' => 0,
        ]);

        Setting::create([
            'name' => 'Header',
            'value' => '',
            'value_int' => 0,
        ]);

        Setting::create([
            'name' => 'Payment_action',
            'value' => '',
            'value_int' => 1,
        ]);

        Setting::create([
            'name' => 'site_name',
            'value' => 'payeer-bonus.uz',
            'value_int' => 0,
        ]);
    }
}
