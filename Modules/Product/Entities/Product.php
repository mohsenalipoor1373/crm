<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ProductAccessories\Entities\ProductAccessories;
use Modules\ProductDim\Entities\ProductDim;
use Modules\ProductIndex\Entities\ProductIndex;
use Modules\ProductPacking\Entities\ProductPacking;
use Modules\ProductShape\Entities\ProductShape;
use Modules\ProductType\Entities\ProductType;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static findOrFail(mixed $id)
 */
class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'products';


    public function product_type()
    {
        return $this->belongsTo(ProductType::class,'product_type_id');
    }
    public function product_shape()
    {
        return $this->belongsTo(ProductShape::class,'product_shape_id');
    }
    public function product_index()
    {
        return $this->belongsTo(ProductIndex::class,'product_index_id');
    }
    public function product_dim()
    {
        return $this->belongsTo(ProductDim::class,'product_dim_id');
    }

    public function product_accessories()
    {
        return $this->hasMany(ProductAccessories::class);
    }

    public function product_packing()
    {
        return $this->hasMany(ProductPacking::class);
    }



    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\ProductFactory::new();
    }
}
