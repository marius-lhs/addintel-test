<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Collection;

/**
 * Class Order
 * @package App\Models
 * @mixin Builder
 *
 * @property int $id
 * @property string $status
 *
 * @property Collection|Recipe[] $recipes
 */
class Order extends Model
{
    const STATUS_PENDING    = 'pending';
    const STATUS_PREPARING  = 'preparing';
    const STATUS_COOKING    = 'cooking';
    const STATUS_READY      = 'ready';
    const STATUS_DELIVERED  = 'delivered';
    const STATUS_CANCELLED  = 'cancelled';

    protected $table    = 'luigis_orders';
    public $timestamps  = true;
    protected $fillable = ['status'];

    /**
     * @return string[]
     */
    public static function getStatuses(): array
    {
        return [
            self::STATUS_PREPARING,
            self::STATUS_PREPARING,
            self::STATUS_COOKING,
            self::STATUS_READY,
            self::STATUS_DELIVERED,
            self::STATUS_CANCELLED,
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function recipes(): HasManyThrough
    {
        return $this->hasManyThrough(
            Recipe::class,
            OrderRecipe::class,
            'order_id',
            'id',
            'id',
            'recipe_id'
        );
    }

    /**
     * Accessor for computed price of all items in all recipes in given order.
     *
     * @return float
     */
    public function getPriceAttribute(): float
    {
        return $this->recipes()->ingredients()->sum('price');
    }
}
