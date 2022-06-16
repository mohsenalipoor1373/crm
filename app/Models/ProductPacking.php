<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
