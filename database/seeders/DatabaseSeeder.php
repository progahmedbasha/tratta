<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
         $this->call([
        UserTypeSeeder::class,
        UserSeeder::class,
        AgeSeeder::class,
        GenderSeeder::class,
        WeightSeeder::class,
        WeightGenderSeeder::class,
        CategorySeeder::class,
        IllnessCategorySeeder::class,
        IllnessSubSeeder::class,
        IndicationSeeder::class,
        PregnancyStageSeeder::class,
        PregnancySafetySeeder::class,
        NursingSafetyCategorySeeder::class,
        FormulaSeeder::class,
        EffectsSeeder::class,
        CountrySeeder::class,
        CrclRangeSeeder::class,
        ScrSeeder::class,
        DrugSeeder::class,
        DrugFormulaSeeder::class,
        InteractionSeveritySeeder::class,
        KidneySeeder::class,
        DoseTypeSeeder::class,
        ]);
    }
}