<?php

namespace Modules\ProductType\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static findOrFail(mixed $id)
 * @method static create(array $array)
 */
class ProductType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'products_type';

    protected static function newFactory()
    {
        return \Modules\ProductType\Database\factories\ProductTypeFactory::new();
    }
}
