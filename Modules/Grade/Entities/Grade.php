<?php

namespace Modules\Grade\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\EarlyMaterials\Entities\EarlyMaterials;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static find(mixed $id)
 */
class Grade extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'grades';

    public function early_materials()
    {
        return $this->hasMany(EarlyMaterials::class);
    }
    protected static function newFactory()
    {
        return \Modules\Grade\Database\factories\GradeFactory::new();
    }
}
