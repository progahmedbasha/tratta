<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class WeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('weights')->insert([
            'weight' => 'average',
        ]);
        DB::table('weights')->insert([
            'weight' => 'over weight',
        ]);
        DB::table('weights')->insert([
            'weight' => 'under weight',
        ]);
    }
}