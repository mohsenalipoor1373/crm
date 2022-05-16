<?php

namespace Modules\EssentialsDealers\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\EssentialsPacking\Entities\EssentialsPacking;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static findOrFail(mixed $id)
 */
class EssentialsDealers extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'essentials_dealers';

    public function essentials_packing()
    {
        return $this->belongsTo(EssentialsPacking::class,'essentials_packing_id');
    }

    protected static function newFactory()
    {
        return \Modules\EssentialsDealers\Database\factories\EssentialsDealersFactory::new();
    }
}
