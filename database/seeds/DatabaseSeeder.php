<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->command->info('Start Codes Seeder');

        $shelves = array('﻿A10A', 'A10B', 'A10B', 'A10B', 'A10B');
        $codes = array('41501', '2358', '2369', '2376', '2376');
        $quantity = array(null, null, null, 4, null);
        $colours = array('', 'EVERGREEN', 'EVERGREEN', 'IVORY', 'EVERGREEN');
        $descriptions = array('PINE CONE GOBLET', '6" COLUMN CANDLE', '10" TAPER CANDLE', '8" COLUMN CANDLE', '8" COLUMN CANDLE');
        $make = array(null, null, null, 'Portmeirion', 'Trudeau');
        $group = array('XMAS', 'XMAS', 'KITCHEN', 'DRINK', 'DRINK');

        for ($i = 0; $i < count($shelves); ++$i) {
            DB::table('items')->insert([
            'shelf' => $shelves[$i],
            'code' => $codes[$i],
            'colour' => $colours[$i],
            'description' => $descriptions[$i],
            'quantity' => $quantity[$i],
            'make' => $make[$i],
            'group' => $group[$i],
          ]);
        }

        $this->command->info('End Codes Seeder');

        // $this->call(UsersTableSeeder::class);
    }
}
