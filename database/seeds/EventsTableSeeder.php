<?php

use App\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            Event::create([
                'name' => $faker->name,
                'description' => $faker->paragraph,
                'country' => $faker->country,
                'city' => $faker->city,
                'address' => $faker->address,
                'lat' => $faker->latitude,
                'lon' => $faker->longitude,
                'author_id' => $faker->numberBetween(1, 50),
                'status' => $faker->numberBetween(1, 2),
                'type' => $faker->numberBetween(1, 5),
                'begin_time' => $faker->dateTime,
                'end_time' => $faker->dateTime,
                'update_at' => $faker->dateTime
            ]);
        }
    }
}
