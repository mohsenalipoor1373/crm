<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabelInventoryTransactionType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'label_inventory_transaction_types';
}
