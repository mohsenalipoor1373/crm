<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'events_type';

    public function events_customers()
    {
        return $this->hasMany(EventsCustomers::class);
    }

}
