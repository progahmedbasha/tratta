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
            'effect_type' => 'effect type 1',
            'number' => 1,
            'color' => '#563d7c',
        ]);
    }
}