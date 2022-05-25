<?php

namespace Modules\Reminder\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static whereCustomerId(mixed $id)
 * @method static create(array $array)
 * @method static find(mixed $id)
 */
class Reminder extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'reminders';




    protected static function newFactory()
    {
        return \Modules\Reminder\Database\factories\ReminderFactory::new();
    }
}
