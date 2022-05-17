<?php

namespace Modules\Users\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Modules\ColorMasterbatch\Entities\ColorMasterbatch;
use Modules\Customers\Entities\Customers;
use Spatie\Permission\Traits\HasRoles;

/**
 * @method static orderBy(string $string, string $string1)
 */
class User extends Model
{
    use Notifiable;
    use HasRoles;

    protected $guarded = ['id'];


    public function customers()
    {
        return $this->hasMany(Customers::class);
    }


}



