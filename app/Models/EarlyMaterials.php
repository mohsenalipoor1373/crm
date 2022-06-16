<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
