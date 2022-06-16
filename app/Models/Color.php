<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'colors';


    public function color_masterbatchs()
    {
        return $this->hasMany(ColorMasterbatch::class);
    }
}
