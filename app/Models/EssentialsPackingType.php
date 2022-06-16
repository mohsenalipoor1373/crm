<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EssentialsPackingType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'essentials_packing_type';

    public function essentials_packing()
    {
        return $this->hasMany(EssentialsPacking::class);
    }

}
