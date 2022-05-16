<?php

namespace Modules\ProductPacking\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\EssentialsPacking\Entities\EssentialsPacking;
use Modules\Product\Entities\Product;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static findOrFail(mixed $id)
 * @method static create(array $array)
 */
class ProductPacking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'product_packing';

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function essentials_packing()
    {
        return $this->belongsTo(EssentialsPacking::class,'essentials_packing_id');
    }

    protected static function newFactory()
    {
        return \Modules\ProductPacking\Database\factories\ProductPackingFactory::new();
    }
}
