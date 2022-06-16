<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductShape extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'products_shape';

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
