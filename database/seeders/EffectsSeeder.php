<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EffectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('effects')->insert([
            'effect_type' => 'Not effect',
            'number' => 6,
            'color' => '#f2f4fb',
        ]);
        DB::table('effects')->insert([
            'effect_type' => 'nill effect',
            'number' => 5,
            'color' => '#9bfcca',
        ]);
        DB::table('effects')->insert([
            'effect_type' => 'x2 effect',
            'number' => 4,
            'color' => '#fb8f66',
        ]);
        DB::table('effects')->insert([
            'effect_type' => 'xl effect',
            'number' => 3,
            'color' => '#77a',
        ]);
    }
}