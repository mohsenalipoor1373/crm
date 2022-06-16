<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static findOrFail(mixed $id)
 */
class LabelType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'label_types';
}
