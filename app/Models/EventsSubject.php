<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsSubject extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'events_subject';


    public function events_result()
    {
        return $this->hasMany(EventsResult::class);
    }

    public function events_result_reason()
    {
        return $this->hasMany(EventsResultReason::class);
    }

    public function events_customers()
    {
        return $this->hasMany(EventsCustomers::class);
    }

}
