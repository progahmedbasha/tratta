<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dose_types')->insert([
            'type' => 'Fixed Dose',
        ]);
        DB::table('dose_types')->insert([
            'type' => 'Dose And',
        ]);
        DB::table('dose_types')->insert([
            'type' => 'Dose or',
        ]);
        DB::table('dose_types')->insert([
            'type' => 'Notes or',
        ]);
        DB::table('dose_types')->insert([
            'type' => 'Notes And',
        ]);
    }
}