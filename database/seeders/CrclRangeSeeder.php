<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CrclRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           DB::table('crcl_ranges')->insert([
            'illness_sub_id' => 1,
            'range_from' => 50,
            'range_to' => 80,
        ]);
    }
}