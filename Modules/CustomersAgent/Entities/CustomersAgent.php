<?php

namespace Modules\CustomersAgent\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Customers\Entities\Customers;

/**
 * @method static findOrFail(mixed $id)
 * @method static create(array $array)
 * @method static orderBy(string $string, string $string1)
 */
class CustomersAgent extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'customers_agent';

    public function customer()
    {
        return $this->belongsTo(Customers::class,'customer_id');
    }

    protected static function newFactory()
    {
        return \Modules\CustomersAgent\Database\factories\CustomersAgentFactory::new();
    }
}
