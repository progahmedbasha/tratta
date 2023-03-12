<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class NursingSafetyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nursing_safety_categories')->insert([
            'type' => 'compatible',
            'value' => 'value',
        ]);
        DB::table('nursing_safety_categories')->insert([
            'type' => 'incompatible',
            'value' => 'value',
        ]);
    }
}