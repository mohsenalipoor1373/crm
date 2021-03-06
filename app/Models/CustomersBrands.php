<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomersBrands extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'customers_brands';


    public function customer()
    {
        return $this->belongsTo(Customers::class,'customer_id');
    }


}
