<?php

namespace Modules\EssentialsPackingType\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\EssentialsPacking\Entities\EssentialsPacking;

/**
 * @method static findOrFail(mixed $id)
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 */
class EssentialsPackingType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'essentials_packing_type';

    public function essentials_packing()
    {
        return $this->hasMany(EssentialsPacking::class);
    }

    protected static function newFactory()
    {
        return \Modules\EssentialsPackingType\Database\factories\EssentialsPackingTypeFactory::new();
    }
}
