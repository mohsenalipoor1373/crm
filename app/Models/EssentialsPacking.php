<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EssentialsPacking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'essentials_packing';

    public function essentials_packing_type()
    {
        return $this->belongsTo(EssentialsPackingType::class,'essentials_packing_type_id');
    }

    public function essentials_dealers()
    {
        return $this->hasMany(EssentialsDealers::class);
    }

    public function product_packing()
    {
        return $this->hasMany(ProductPacking::class);
    }

}
