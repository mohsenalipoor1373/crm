<?php

namespace Modules\EarlyMaterials\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Grade\Entities\Grade;
use Modules\Material\Entities\Material;
use Modules\Petrochemical\Entities\Petrochemical;
use Modules\QualityMaterials\Entities\QualityMaterials;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static findOrFail($id)
 * @method static find(mixed $id)
 */
class EarlyMaterials extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'early_materials';


    public function material()
    {
        return $this->belongsTo(Material::class,'material_id');
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class,'grade_id');
    }
    public function petrochemical()
    {
        return $this->belongsTo(Petrochemical::class,'petrochemical_id');
    }
    public function quality_material()
    {
        return $this->belongsTo(QualityMaterials::class,'quality_materials_id');
    }

    protected static function newFactory()
    {
        return \Modules\EarlyMaterials\Database\factories\EarlyMaterialsFactory::new();
    }
}
