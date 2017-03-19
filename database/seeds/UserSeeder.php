<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

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
        $admin->save();

        //

        $faker = Faker::create();
        for ($i=0; $i < 100; $i++) {
            $id = \DB::table('users')->insertGetId(array(
               'nick' => $faker->userName,
                'email' => $faker->email,
                'password' => bcrypt('123456'),
                'rol' => 'user',

            ));
        }






















    }
}
