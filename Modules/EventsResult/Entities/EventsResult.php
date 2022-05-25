<?php

namespace Modules\EventsResult\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\EventsCustomers\Entities\EventsCustomers;
use Modules\EventsResultReason\Entities\EventsResultReason;
use Modules\EventsSubject\Entities\EventsSubject;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static findOrFail(mixed $id)
 */
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

    protected static function newFactory()
    {
        return \Modules\EventsResult\Database\factories\EventsResultFactory::new();
    }
}
