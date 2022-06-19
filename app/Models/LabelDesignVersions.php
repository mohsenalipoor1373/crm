<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static findOrfail(mixed $id)
 */
class LabelDesignVersions extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'label_design_versions';

    public function label_design()
    {
        return $this->belongsTo(LabelDesign::class, 'label_design_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function designer()
    {
        return $this->belongsTo(User::class, 'designer_id');
    }
}
