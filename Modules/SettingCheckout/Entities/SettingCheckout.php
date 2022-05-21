<?php

namespace Modules\SettingCheckout\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static findOrFail(mixed $id)
 */
class SettingCheckout extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'setting_checkout';
    protected static function newFactory()
    {
        return \Modules\SettingCheckout\Database\factories\SettingCheckoutFactory::new();
    }
}
