<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EssentialsDealers extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'essentials_dealers';

    public function essentials_packing()
    {
        return $this->belongsTo(EssentialsPacking::class,'essentials_packing_id');
    }
}
