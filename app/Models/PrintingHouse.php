<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintingHouse extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'printing_house';
}
