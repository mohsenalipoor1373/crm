<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityMaterials extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'quality_materials';

    public function early_materials()
    {
        return $this->hasMany(EarlyMaterials::class);
    }

}
