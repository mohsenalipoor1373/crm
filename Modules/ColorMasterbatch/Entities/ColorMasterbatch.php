<?php

namespace Modules\ColorMasterbatch\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Color\Entities\Color;
use Modules\Masterbach\Entities\Masterbach;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static findOrFail(mixed $id)
 * @method static find(mixed $id)
 */
class ColorMasterbatch extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'colors_masterbatchs';


    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function masterbach()
    {
        return $this->belongsTo(Masterbach::class,'masterbatch_id');
    }


    protected static function newFactory()
    {
        return \Modules\ColorMasterbatch\Database\factories\ColorMasterbatchFactory::new();
    }
}
