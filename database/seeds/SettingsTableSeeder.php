<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name' => 'Laravel\'s Blog',
            'address' => 'Poland, Lublin',
            'contact_number' => '666 66 66 66',
            'contact_email' => 'info@laravel.pl'
        ]);
    }
}
