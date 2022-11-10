<?php

use Illuminate\Database\Seeder;

class TodocontentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');
        for($i = 0;$i < 10;$i++){
        App\Todocontent::create([
            'title' => $faker->word(),
            'user_id' => $faker->numberBetween(1,2),
            'deadline' => $faker->dateTime('now'),
            'content' => $faker->word(),
            ]);
        }
    }
}
