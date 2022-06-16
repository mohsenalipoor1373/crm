<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grouping extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'groupings';

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
