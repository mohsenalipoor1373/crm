<?php

namespace Modules\Color\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ColorMasterbatch\Entities\ColorMasterbatch;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static findOrFail(mixed $id)
 * @method static create(array $array)
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

    protected static function newFactory()
    {
        return \Modules\Color\Database\factories\ColorFactory::new();
    }
}
