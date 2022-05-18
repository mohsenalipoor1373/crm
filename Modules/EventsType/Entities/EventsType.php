<?php

namespace Modules\EventsType\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static findOrFail(mixed $id)
 * @method static create(array $array)
 */
class EventsType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'events_type';

    protected static function newFactory()
    {
        return \Modules\EventsType\Database\factories\EventsTypeFactory::new();
    }
}
