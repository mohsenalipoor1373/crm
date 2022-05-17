<?php

namespace Modules\Industrial\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Customers\Entities\Customers;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static findOrFail(mixed $id)
 * @method static create(array $array)
 */
class Industrial extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'industrial';

    public function customers()
    {
        return $this->hasMany(Customers::class);
    }
    protected static function newFactory()
    {
        return \Modules\Industrial\Database\factories\IndustrialFactory::new();
    }
}
