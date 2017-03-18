<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = new User;

        $admin->nick = 'admin';
        $admin->email = 'mail@mail.com';
        $admin->password = bcrypt('123456');
        $admin->rol = 'admin';

    }
}
