<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipe;

class RecipeTableSeeder extends Seeder
{
    public function run()
    {
        foreach (Recipe::getMainRecipes() as $recipe) {
            foreach ($recipe['ingredients'] as $ingredient) {
                Recipe::updateOrCreate(
                    [
                        'id'    => $recipe['id'],
                        'name'  => $recipe['name']
                    ],
                    [
                        'price' => $recipe['price'],
                    ]
                );

            }
        }
    }
}
