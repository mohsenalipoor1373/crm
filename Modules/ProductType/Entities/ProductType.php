<?php

namespace Modules\ProductType\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static findOrFail(mixed $id)
 * @method static create(array $array)
 */
class ProductType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'products_type';

    public function products()
    {
        return $this->hasMany(Product::class);
    }


    protected static function newFactory()
    {
        return \Modules\ProductType\Database\factories\ProductTypeFactory::new();
    }
}
