<?php

namespace Modules\EventsCustomers\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Customers\Entities\Customers;
use Modules\EventsResult\Entities\EventsResult;
use Modules\EventsResultReason\Entities\EventsResultReason;
use Modules\EventsSubject\Entities\EventsSubject;
use Modules\EventsType\Entities\EventsType;
use Modules\Users\Entities\User;

/**
 * @method static create(array $array)
 * @method static find(mixed $id)
 * @method static lastInsertId()
 * @method static latest()
 * @method static orderBy(string $string, string $string1)
 * @method static findOrFail(mixed $id)
 */
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
    protected static function newFactory()
    {
        return \Modules\EventsCustomers\Database\factories\EventsCustomersFactory::new();
    }
}
