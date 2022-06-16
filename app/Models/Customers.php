<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'customers';


    public function seller()
    {
        return $this->belongsTo(User::class,'seller_id');
    }

    public function designer()
    {
        return $this->belongsTo(User::class,'designer_id');
    }

    public function industrial()
    {
        return $this->belongsTo(Industrial::class,'industrial_id');
    }

    public function state_city()
    {
        return $this->belongsTo(StateCity::class,'state_city_id');
    }

    public function customers_brands()
    {
        return $this->hasMany(CustomersBrands::class);
    }


    public function events_customers()
    {
        return $this->hasMany(EventsCustomers::class);
    }

    public function customers_agent()
    {
        return $this->hasMany(CustomersBrands::class);
    }
}
