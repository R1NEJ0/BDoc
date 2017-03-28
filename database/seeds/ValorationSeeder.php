<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use App\User;

use App\File;

class ValorationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker = Faker::create();
        $users = User::all()->pluck('id')->toArray();
        $files = File::all()->pluck('id')->toArray();

        for ($i = 0; $i < 600; $i++){
            $id =\DB::table('valorations')->insertGetId(array(

                'like' => $faker->boolean(),

                'user_id' => $faker->randomElement($users),
                'file_id' => $faker->randomElement($files),

            ));
        }
    }
}
