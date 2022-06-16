<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class ProductInventoryTransactionType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'product_inventory_transaction_types';
}
