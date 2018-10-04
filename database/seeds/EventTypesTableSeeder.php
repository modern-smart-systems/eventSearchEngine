<?php

use App\EventType;
use Illuminate\Database\Seeder;

class EventTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            EventType::create([
                'type' => $faker->shuffleString(5),
                'name' => $faker->title,
            ]);
        }
    }
}
