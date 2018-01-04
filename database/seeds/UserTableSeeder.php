<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'Kati',
            'email' => 'example@hello.pl',
            'password' => bcrypt('password'),
            'admin' => 1
        ]);
    
        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'link to avatar',
            'about' => 'Interested description',
            'youtube' => 'youtube.com',
            'facebook' => 'facebook.com'
        ]);
    }
}
