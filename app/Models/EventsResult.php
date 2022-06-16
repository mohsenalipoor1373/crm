<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsResult extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'events_result';

    public function events_result_reason()
    {
        return $this->hasMany(EventsResultReason::class);
    }

    public function events_subject()
    {
        return $this->belongsTo(EventsSubject::class,'events_subject_id');
    }

    public function events_customers()
    {
        return $this->hasMany(EventsCustomers::class);
    }
}
