<?php

namespace Modules\EventsResultReason\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\EventsResult\Entities\EventsResult;
use Modules\EventsSubject\Entities\EventsSubject;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static findOrFail(mixed $id)
 */
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


    protected static function newFactory()
    {
        return \Modules\EventsResultReason\Database\factories\EventsResultReasonFactory::new();
    }
}
