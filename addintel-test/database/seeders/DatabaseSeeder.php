<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Database\Seeders\IngredientTableSeeder;
use Database\Seeders\RecipeIngredientTableSeeder;
use Database\Seeders\RecipeTableSeeder;

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
