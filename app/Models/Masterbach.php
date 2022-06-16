<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masterbach extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'masterbachs';


    public function color_masterbatchs()
    {
        return $this->hasMany(ColorMasterbatch::class);
    }
}
