<?php

namespace Modules\Grouping\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static findById(mixed $id)
 * @method static find(mixed $id)
 * @method static findOrFail(mixed $id)
 */
class Grouping extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'groupings';

    public function users()
    {
        return $this->hasMany(User::class);
    }


    protected static function newFactory()
    {
        return \Modules\Grouping\Database\factories\GroupingFactory::new();
    }
}
