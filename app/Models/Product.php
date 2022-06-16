<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
