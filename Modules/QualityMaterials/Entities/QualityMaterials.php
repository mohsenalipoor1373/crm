<?php

namespace Modules\QualityMaterials\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\EarlyMaterials\Entities\EarlyMaterials;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static findOrFail(mixed $id)
 * @method static find(mixed $id)
 */
class QualityMaterials extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'quality_materials';

    public function early_materials()
    {
        return $this->hasMany(EarlyMaterials::class);
    }

    protected static function newFactory()
    {
        return \Modules\QualityMaterials\Database\factories\QualityMaterialsFactory::new();
    }
}
