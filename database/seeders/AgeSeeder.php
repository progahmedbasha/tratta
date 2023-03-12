<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ages')->insert([
            'name' => 'adult',
            'from' => 20,
            'to' => 50,
        ]);
        DB::table('ages')->insert([
            'name' => 'elderly',
            'from' => 20,
            'to' => 50,
        ]);
    }
}