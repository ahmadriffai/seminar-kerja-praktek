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
        //
        $user = new \App\Model\User();
        $user->id = \App\Util\RandomUtil::generate("U");
        $user->username = "admin";
        $user->email = "admin@mail.com";
        $user->password = \Illuminate\Support\Facades\Hash::make("rahasia");
        $user->role = 'Admin';
        $user->save();
    }
}
