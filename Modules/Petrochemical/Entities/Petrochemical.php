<?php

namespace Modules\Petrochemical\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\EarlyMaterials\Entities\EarlyMaterials;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static find(mixed $id)
 * @method static findOrFail(mixed $id)
 * @method static create(array $array)
 */
class Petrochemical extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'petrochemicals';

    public function early_materials()
    {
        return $this->hasMany(EarlyMaterials::class);
    }
    protected static function newFactory()
    {
        return \Modules\Petrochemical\Database\factories\PetrochemicalFactory::new();
    }
}
