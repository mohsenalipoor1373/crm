<?php

namespace Modules\EventsType\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\EventsCustomers\Entities\EventsCustomers;

/**
 * @method static findOrFail(mixed $id)
 * @method static create(array $array)
 */
class EventsType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'events_type';

    public function events_customers()
    {
        return $this->hasMany(EventsCustomers::class);
    }

    protected static function newFactory()
    {
        return \Modules\EventsType\Database\factories\EventsTypeFactory::new();
    }
}
