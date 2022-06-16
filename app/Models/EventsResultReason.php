<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsResultReason extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'events_result_reason';

    public function events_subject()
    {
        return $this->belongsTo(EventsSubject::class, 'events_subject_id');
    }

    public function events_result()
    {
        return $this->belongsTo(EventsResult::class, 'events_result_id');
    }

    public function events_customers()
    {
        return $this->hasMany(EventsCustomers::class);
    }

}
