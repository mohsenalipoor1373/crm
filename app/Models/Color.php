<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 */
class Color extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'colors';


    public function color_masterbatchs()
    {
        return $this->hasMany(ColorMasterbatch::class);
    }
    public function product_labels()
    {
        return $this->hasMany(ProductLabel::class);
    }
}
