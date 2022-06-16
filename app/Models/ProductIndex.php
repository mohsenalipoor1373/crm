<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail(mixed $id)
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 */
class ProductIndex extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'products_index';

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
