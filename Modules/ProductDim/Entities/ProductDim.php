<?php

namespace Modules\ProductDim\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static findOrFail(mixed $id)
 * @method static create(array $array)
 */
class ProductDim extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'products_dim';

    public function products()
    {
        return $this->hasMany(Product::class);
    }


    protected static function newFactory()
    {
        return \Modules\ProductDim\Database\factories\ProductDimFactory::new();
    }
}
