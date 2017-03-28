<?php

use Illuminate\Database\Seeder;
use App\Comment;

use Faker\Factory as Faker;

use App\User;
use App\File;

class CommentSeeder extends Seeder
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

        for ($i = 0; $i < 300; $i++){
            $id =\DB::table('comments')->insertGetId(array(

                'comment' => $faker->text(300),
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,

                'user_id' => $faker->randomElement($users),
                'file_id' => $faker->randomElement($files),

            ));
        }



    }
}
