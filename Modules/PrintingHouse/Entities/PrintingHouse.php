<?php

namespace Modules\PrintingHouse\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static findOrFail(mixed $id)
 */
class PrintingHouse extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'printing_house';

    protected static function newFactory()
    {
        return \Modules\PrintingHouse\Database\factories\PrintingHouseFactory::new();
    }
}
