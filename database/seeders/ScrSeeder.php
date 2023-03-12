<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('scrs')->insert([
            'illness_category_id' => 1,
            'gender_id' => 1,
            'range_from' => 50,
            'range_to' => 80,
        ]);
    }
}