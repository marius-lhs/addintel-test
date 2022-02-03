<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use IngredientTableSeeder;
use RecipeIngredientTableSeeder;
use RecipeTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(IngredientTableSeeder::class);
        $this->command->info('Ingredient table seeded!');

        $this->call(RecipeTableSeeder::class);
        $this->command->info('Recipe table seeded!');

        $this->call(RecipeIngredientTableSeeder::class);
        $this->command->info('RecipeIngredient table seeded!');    }
}
