<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petrochemical extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'petrochemicals';

    public function early_materials()
    {
        return $this->hasMany(EarlyMaterials::class);
    }
}
