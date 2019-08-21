<?php

use Illuminate\Database\Seeder;

class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisions = [
            [
                'name' => "Ilocos Norte",
                'region_id' => 1
            ],
            [
                'name' => "Laoag City",
                'region_id' => 1
            ],
            [
                'name' => "Dagupan City",
                'region_id' => 2
            ],
            [
                'name' => "San Fernando City",
                'region_id' => 3
            ],
            [
                'name' => "Sta. Rosa City",
                'region_id' => 4
            ],
            [
                'name' => "Puerto Princesa City",
                'region_id' => 5
            ],
            [
                'name' => "Legazpi City",
                'region_id' => 6
            ],
            [
                'name' => "Iloilo City",
                'region_id' => 7
            ],
            [
                'name' => "Cebu City",
                'region_id' => 8
            ],
            [
                'name' => "Ormoc City",
                'region_id' => 9
            ],
            [
                'name' => "Zamboanga City",
                'region_id' => 10
            ],
            [
                'name' => "Ozamis City",
                'region_id' => 11
            ],
            [
                'name' => "Davao City",
                'region_id' => 12
            ],
            [
                'name' => "Koronadal City",
                'region_id' => 13
            ],
            [
                'name' => "Cotabato City",
                'region_id' => 15
            ],
            [
                'name' => "Baguio City",
                'region_id' => 16
            ],
            [
                'name' => "Butuan City",
                'region_id' => 14
            ],
            [
                'name' => "Makati City",
                'region_id' => 17
            ]

        ];
        foreach ($divisions as $key => $value) {
            \App\Division::insert([
                $key => $value
            ]);
        }
    }
}
