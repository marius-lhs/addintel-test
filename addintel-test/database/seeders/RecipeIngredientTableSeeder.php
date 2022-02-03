<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;
use App\Models\RecipeIngredient;

class RecipeIngredientTableSeeder extends Seeder
{
    public function run()
    {
        foreach (Recipe::getMainRecipes() as $recipe) {
            foreach ($recipe['ingredients'] as $ingredient) {
                if (!is_int($ingredient)) {
                    continue;
                }

                RecipeIngredient::updateOrCreate(
                    [
                        'recipe_id'     => $recipe['id'],
                        'ingredient_id' => $ingredient,
                    ],
                    [
                        'amount'        => 2
                    ]
                );
            }
        }
    }
}
