<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Collection;

/**
 * Class Recipe
 * @package App\Models
 * @mixin Builder
 *
 * @property int $id
 * @property string $name
 * @property float $price
 *
 * @property-read Collection|Ingredient[] $ingredients
 * @property-read Collection|RecipeIngredient[] $ingredientRequirements
 * @property-read Collection|Order[] $orders
 */
class Recipe extends Model
{
    public const MARGHERITA_ID = 1;
    public const HAWAIIAN_ID   = 2;

    protected $table    = 'luigis_recipes';
    protected $fillable = ['id', 'name', 'price'];
    public $timestamps  = false;

    /**
     * @return array[]
     */
    public static function getMainRecipes(): array
    {
        return [
            [
                'id'          => self::MARGHERITA_ID,
                'name'        => 'margherita',
                'ingredients' => [
                    Ingredient::TOMATO_ID,
                    Ingredient::MOZZARELLA_ID,
                ],
                'price'       => 6.99,
            ],
            [
                'id'          => self::HAWAIIAN_ID,
                'name'        => 'hawaiian',
                'ingredients' => [
                    Ingredient::TOMATO_ID,
                    Ingredient::PINEAPPLE_ID,
                    Ingredient::HAM_ID,
                ],
                'price'       => 8.99,
            ],
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function ingredients(): HasManyThrough
    {
        return $this->hasManyThrough(
            Ingredient::class,
            RecipeIngredient::class,
            'recipe_id',
            'id',
            'id',
            'ingredient_id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ingredientRequirements(): HasMany
    {
        return $this->hasMany(RecipeIngredient::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function orders(): HasManyThrough
    {
        return $this->hasManyThrough(
            Order::class,
            OrderRecipe::class,
            'recipe_id',
            'id',
            'id',
            'order_id'
        );
    }
}
