<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB; 

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'setting_name' => 'phone',
            'setting_value' => '+880 1210'
        ]);

        DB::table('settings')->insert([
            'setting_name' => 'email',
            'setting_value' => 'dipu@gmail.com'
        ]);
    }
}
