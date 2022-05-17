<?php

namespace Modules\CustomersBrands\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Customers\Entities\Customers;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static findOrFail(mixed $id)
 * @method static create(array $array)
 */
class CustomersBrands extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'customers_brands';


    public function customer()
    {
        return $this->belongsTo(Customers::class,'customer_id');
    }



    protected static function newFactory()
    {
        return \Modules\CustomersBrands\Database\factories\CustomersBrandsFactory::new();
    }
}
