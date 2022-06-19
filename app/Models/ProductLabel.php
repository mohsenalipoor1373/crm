<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static findOrFail(mixed $id)
 */
class ProductLabel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'product_labels';


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function label_design()
    {
        return $this->belongsTo(LabelDesign::class, 'label_design_id');
    }
}
