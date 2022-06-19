<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static findOrFail(mixed $id)
 */
class LabelDesign extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'label_designs';

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }

    public function label_type()
    {
        return $this->belongsTo(LabelType::class, 'label_type_id');
    }

    public function label_design_versions()
    {
        return $this->hasMany(LabelDesignVersions::class);
    }
    public function product_labels()
    {
        return $this->hasMany(ProductLabel::class);
    }

}
