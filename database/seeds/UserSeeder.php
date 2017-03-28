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

        $admin->username = 'admin';
        $admin->email = 'mail@mail.com';
        $admin->password = bcrypt('123456');
        $admin->role = 'admin';
        $admin->save();

        $user = new User;

        $user->username = 'usuario';
        $user->email = 'user@mail.com';
        $user->password = bcrypt('123456');
        $user->role = 'user';
        $user->save();

        //

        $faker = Faker::create();
        for ($i=0; $i < 100; $i++) {
            $id = \DB::table('users')->insertGetId(array(
                'created_at' => $faker->dateTime,
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => bcrypt('123456'),
                'role' => 'user',

            ));
        }
    }
}
