<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Event::class, 60)->create()->each(function ($event) {
            $faker = Faker::create();
            // $num = $faker->numberBetween(1, 9);
            // for ($i = 1; $i <= $num; $i++) {
            $event->participants()->save(factory(App\Participant::class)->create(), ['mobile' => $faker->phoneNumber, 'email' => $faker->email]);
            // }
        });
    }
}
