<?php

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            [
                'name' => 'I',
                'sequence' => 1,
                'area' => 'L'
            ],
            [
                'name' => 'II',
                'sequence' => 2,
                'area' => 'L'
            ],
            [
                'name' => 'III',
                'sequence' => 3,
                'area' => 'L'
            ],
            [
                'name' => 'IV-CALABARZON',
                'sequence' => 4,
                'area' => 'L'
            ],
            [
                'name' => 'IV-MIMAROPA',
                'sequence' => 5,
                'area' => 'L'
            ],
            [
                'name' => 'V',
                'sequence' => 6,
                'area' => 'L'
            ],
            [
                'name' => 'VI',
                'sequence' => 7,
                'area' => 'V'
            ],
            [
                'name' => 'VII',
                'sequence' => 8,
                'area' => 'V'
            ],
            [
                'name' => 'VIII',
                'sequence' => 9,
                'area' => 'V'
            ],
            [
                'name' => 'IX',
                'sequence' => 10,
                'area' => 'M'
            ],
            [
                'name' => 'X',
                'sequence' => 11,
                'area' => 'M'
            ],
            [
                'name' => 'XI',
                'sequence' => 12,
                'area' => 'M'
            ],
            [
                'name' => 'XII',
                'sequence' => 13,
                'area' => 'M'
            ],
            [
                'name' => 'Caraga',
                'sequence' => 14,
                'area' => 'M'
            ],
            [
                'name' => 'BARMM',
                'sequence' => 15,
                'area' => 'M'
            ],
            [
                'name' => 'CAR',
                'sequence' => 16,
                'area' => 'L'
            ],
            [
                'name' => 'NCR',
                'sequence' => 17,
                'area' => 'L'
            ],
            [
                'name' => 'NIR',
                'sequence' => 18,
                'area' => 'V',
                'active' => false
            ],
        ];

        foreach ($regions as $key => $value) {
            \App\Region::insert([
                $key => $value
            ]);
        }
    }
}
