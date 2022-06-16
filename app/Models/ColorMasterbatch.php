<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorMasterbatch extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'colors_masterbatchs';


    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function masterbach()
    {
        return $this->belongsTo(Masterbach::class,'masterbatch_id');
    }

}
