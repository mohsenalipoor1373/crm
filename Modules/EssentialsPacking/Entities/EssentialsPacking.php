<?php

namespace Modules\EssentialsPacking\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\EssentialsDealers\Entities\EssentialsDealers;
use Modules\EssentialsPackingType\Entities\EssentialsPackingType;
use Modules\ProductPacking\Entities\ProductPacking;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static findOrFail(mixed $id)
 */
class EssentialsPacking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'essentials_packing';

    public function essentials_packing_type()
    {
        return $this->belongsTo(EssentialsPackingType::class,'essentials_packing_type_id');
    }

    public function essentials_dealers()
    {
        return $this->hasMany(EssentialsDealers::class);
    }

    public function product_packing()
    {
        return $this->hasMany(ProductPacking::class);
    }

    protected static function newFactory()
    {
        return \Modules\EssentialsPacking\Database\factories\EssentialsPackingFactory::new();
    }
}
