<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static findOrFail(mixed $id)
 * @method static create(array $array)
 */
class MaterialInventoryTransactionType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'material_inventory_transaction_types';
}
