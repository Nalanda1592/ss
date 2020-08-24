<?php

use Illuminate\Database\Seeder;

class StandardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $standards = [1,2,3,4,5,6,7,8,9,10];

        foreach ($standards as $standard) {
            \App\Standard::create([
                'name' => $standard,
                'sequence' => $standard
            ]);
        }
    }
}
