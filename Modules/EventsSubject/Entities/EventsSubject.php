<?php

namespace Modules\EventsSubject\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\EventsCustomers\Entities\EventsCustomers;
use Modules\EventsResult\Entities\EventsResult;
use Modules\EventsResultReason\Entities\EventsResultReason;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static findOrFail(mixed $id)
 */
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

    protected static function newFactory()
    {
        return \Modules\EventsSubject\Database\factories\EventsSubjectFactory::new();
    }
}
