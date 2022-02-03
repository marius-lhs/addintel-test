<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingredient;

class IngredientTableSeeder extends Seeder
{
    public function run()
    {
        foreach (Ingredient::getEssentialIngredients() as $id => $name) {
            Ingredient::updateOrCreate(
                [
                    'id'   => $id
                ],
                [
                    'name' => $name
                ]
            );
        }
    }
}
