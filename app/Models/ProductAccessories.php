<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
