<?php

namespace Modules\Shift\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static create(array $array)
 * @method static findOrFail(mixed $id)
 */
class Shift extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'shifts';

    protected static function newFactory()
    {
        return \Modules\Shift\Database\factories\ShiftFactory::new();
    }
}
