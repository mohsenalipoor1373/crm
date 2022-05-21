<?php

namespace Modules\SettingCompany\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static findOrFail(mixed $id)
 */
class SettingCompany extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table='setting_company';

    protected static function newFactory()
    {
        return \Modules\SettingCompany\Database\factories\SettingCompanyFactory::new();
    }
}
