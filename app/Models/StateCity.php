<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateCity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'state_city';

    public function customers()
    {
        return $this->hasMany(Customers::class);
    }
}
