<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use App\User;

class FileSeeder extends Seeder
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
        for ($i=0; $i < 200; $i++) {
            $id =\DB::table('files')->insertGetId(array(
                'created_at' => $faker->dateTime,
                'size' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0.2, $max = 500),
                'fileName' => $faker->name,
                'fileExtension' => $faker->fileExtension,
                'name' => $faker->name,
                'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'keywords' => $faker->word,
                'url' => $faker->url,
                'thumbnailName' => $faker->name,
                'thumbnailURL' => $faker->imageUrl($width = 640, $height = 480),
                'user_id' => $faker->randomElement($users),

            ));
        }



    }
}
