<?php

namespace Modules\Material\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\EarlyMaterials\Entities\EarlyMaterials;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static findById(mixed $id)
 * @method static find(mixed $id)
 * @method static findOrFail(mixed $id)
 */
class Material extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'materials';

    public function early_materials()
    {
        return $this->hasMany(EarlyMaterials::class);
    }

    protected static function newFactory()
    {
        return \Modules\Material\Database\factories\MaterialFactory::new();
    }
}
