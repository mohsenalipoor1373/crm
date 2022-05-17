<?php

namespace Modules\StateCity\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Customers\Entities\Customers;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static findOrFail(mixed $id)
 */
class StateCity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'state_city';

    public function customers()
    {
        return $this->hasMany(Customers::class);
    }
    protected static function newFactory()
    {
        return \Modules\StateCity\Database\factories\StateCityFactory::new();
    }
}
