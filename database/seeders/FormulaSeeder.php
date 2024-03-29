<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class FormulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('formulas')->insert([
            'name' => 'formula 1',
        ]);
        DB::table('formulas')->insert([
            'name' => 'formula 2',
        ]);
        DB::table('formulas')->insert([
            'name' => 'po tablet',
        ]);
    }
}