<?php

namespace Modules\ProductShape\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static findOrFail(mixed $id)
 */
class ProductShape extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'products_shape';

    public function products()
    {
        return $this->hasMany(Product::class);
    }


    protected static function newFactory()
    {
        return \Modules\ProductShape\Database\factories\ProductShapeFactory::new();
    }
}
