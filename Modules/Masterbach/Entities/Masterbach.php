<?php

namespace Modules\Masterbach\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static findOrFail(mixed $id)
 */
class Masterbach extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'masterbachs';

    protected static function newFactory()
    {
        return \Modules\Masterbach\Database\factories\MasterbachFactory::new();
    }
}
