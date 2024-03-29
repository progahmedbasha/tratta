<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class PregnancyStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pregnancy_stages')->insert([
            'pregnancy_stage' => '1st trimester',
        ]);
        DB::table('pregnancy_stages')->insert([
            'pregnancy_stage' => '1nd trimester',
        ]);
        DB::table('pregnancy_stages')->insert([
            'pregnancy_stage' => '1rd trimester',
        ]);
        DB::table('pregnancy_stages')->insert([
            'pregnancy_stage' => 'nursing',
        ]);
    }
}