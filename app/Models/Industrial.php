<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industrial extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'industrial';

    public function customers()
    {
        return $this->hasMany(Customers::class);
    }
}
