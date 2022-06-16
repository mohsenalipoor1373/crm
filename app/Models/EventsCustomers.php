<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsCustomers extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'events_customers';



    public function customer()
    {
        return $this->belongsTo(Customers::class,'customer_id');
    }

    public function events_type()
    {
        return $this->belongsTo(EventsType::class,'events_type_id');
    }

    public function events_subject()
    {
        return $this->belongsTo(EventsSubject::class,'events_subject_id');
    }



    public function events_result()
    {
        return $this->belongsTo(EventsResult::class,'events_result_id');
    }

    public function events_result_reason()
    {
        return $this->belongsTo(EventsResultReason::class,'events_result_reason_id');
    }

    public function negotiator()
    {
        return $this->belongsTo(User::class,'negotiator_id');
    }
}
