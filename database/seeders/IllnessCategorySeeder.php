<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class IllnessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('illness_categories')->insert([
            'name' => 'ilness category 1',
        ]);
        DB::table('illness_categories')->insert([
            'name' => 'ilness  category 2',
            'parent_id' => 1 ,
        ]);
        DB::table('illness_categories')->insert([
            'name' => 'sub sub',
            'parent_id' => 2 ,
        ]);
    }
}