<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class PregnancySafetySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pregnancy_safeties')->insert([
            'type' => 'A',
            'value' => 'value',
        ]);
        DB::table('pregnancy_safeties')->insert([
            'type' => 'B',
            'value' => 'value',
        ]);
        DB::table('pregnancy_safeties')->insert([
            'type' => 'C',
            'value' => 'value',
        ]);
    }
}