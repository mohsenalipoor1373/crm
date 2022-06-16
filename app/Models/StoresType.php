<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 */
class StoresType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'stores_types';
}
