<?php

namespace Modules\ProductAccessories\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static findOrFail(mixed $id)
 */
class ProductAccessories extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'product_accessories';


    public function product_parent()
    {
        return $this->belongsTo(Product::class, 'product_id_parent');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    protected static function newFactory()
    {
        return \Modules\ProductAccessories\Database\factories\ProductAccessoriesFactory::new();
    }
}
